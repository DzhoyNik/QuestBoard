window.onload = () => {
    const url = new URL(document.URL);
    const taskId = url.searchParams.get("id");
    const btnCheck = document.getElementById("check");
    const btnDelete = document.getElementById("delete");

    const modal = document.getElementsByClassName("modal")[0];
    const modalMsg = modal.getElementsByClassName("modal-msg")[0];
    const btnViewEdit = document.getElementById("edit");
    const inputTitle = document.getElementsByTagName("input")[0];
    const inputText = document.getElementsByTagName("textarea")[0];
    let deadlineTask = "";
    const btnEdit = modal.getElementsByTagName("button")[0];
    const btnClose = modal.getElementsByClassName("modal-close")[0];
    
    $.ajax({
        url: '../php/task/getTask.php',
        method: 'post',
        cache: false,
        data: {taskId: taskId},
        dataType: 'html',
        success: (info) => {
            let data = JSON.parse(info);
            const taskTitle = document.getElementsByClassName("task-title")[0].getElementsByTagName("h1")[0];
            const taskText = document.getElementsByClassName("task-text")[0].getElementsByTagName("p")[0];
            deadlineTask = data["task_" + taskId]["deadline"];

            document.title = data["task_" + taskId]["title"] + " | QuestBoard";
            taskTitle.innerText = data["task_" + taskId]["title"];
            taskText.innerText = data["task_" + taskId]["text"];
            inputTitle.placeholder = data["task_" + taskId]["title"];
            inputText.placeholder = data["task_" + taskId]["text"];
        }
    })

    btnCheck.onclick = () => {
        $.ajax({
            url: '../php/task/deleteTask.php',
            method: 'post',
            cache: false,
            data: {id: taskId},
            dataType: 'html',
            success: () => location.replace("../main.php")
        })
    }

    btnViewEdit.onclick = () => {
        modal.style.display = "flex";
    }

    btnEdit.onclick = () => {
        let newTitle = inputTitle.value;
        let newText = inputText.value;

        if (newTitle == "" && newText == "") {
            modalMsg.style.display = "flex";
            return false;
        }

        if (newTitle == "" && newText != "") {
            newTitle = inputTitle.placeholder;
        }

        if (newTitle != "" && newText == "") {
            newText = inputText.placeholder;
        }

        $.ajax({
            url: '../php/task/editTask.php',
            method: 'post',
            cache: false,
            data: {
                id: taskId,
                newTitle: newTitle,
                newText: newText,
                deadline: deadlineTask
            },
            dataType: 'html',
            success: () => {
                location.reload();
            }
        })
    }

    btnDelete.onclick = () => {
        $.ajax({
            url: '../php/task/deleteTask.php',
            method: 'post',
            cache: false,
            data: {id: taskId},
            dataType: 'html',
            success: () => location.replace("../main.php")
        })
    }

    btnClose.onclick = () => {
        modal.style.display = "none";
    }
}