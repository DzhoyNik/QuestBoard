function newTask(id, title, text, deadline) {
    const tasks = document.getElementsByClassName("tasks-body")[0];
    const task = document.createElement("div");
    const taskTitle = document.createElement("div");
    const taskTitleH1 = document.createElement("h1");
    const taskText = document.createElement("div");
    const taskTextP = document.createElement("p");
    const taskDeadline = document.createElement("div");
    const taskDeadlineP = document.createElement("p");
    const taskDeadlineSpan = document.createElement("span");
    const taskMore = document.createElement("div");
    const taskMoreP = document.createElement("p");
    const taskMoreSpan = document.createElement("span");

    task.classList.add("task");
    task.setAttribute("id", "task_" + id);
    task.setAttribute("onclick", "openTask(" + id + ")");
    taskTitle.classList.add("task-title");
    taskText.classList.add("task-text");
    taskDeadline.classList.add("task-deadline");
    taskDeadlineSpan.classList.add("material-symbols-outlined");
    taskMore.classList.add("task-more");
    taskMoreSpan.classList.add("material-symbols-outlined");

    taskTitleH1.innerText = title;
    taskTextP.innerText = text;
    taskDeadlineP.innerText = deadline;
    taskDeadlineSpan.innerText = "schedule";
    taskMoreP.innerText = "Подробнее";
    taskMoreSpan.innerText = "arrow_forward_ios";

    taskTitle.append(taskTitleH1);
    taskText.append(taskTextP);
    taskDeadline.append(taskDeadlineP);
    taskDeadlineP.prepend(taskDeadlineSpan);
    taskMoreP.append(taskMoreSpan);
    taskMore.append(taskMoreP);
    task.append(taskTitle, taskText, taskDeadline, taskMore);
    tasks.append(task);
}

function newDeleteSection(id, title, text) {
    const formDelete = document.getElementsByClassName("form-delete")[0];
    const selectBody = formDelete.getElementsByClassName("select-body")[0];
    const select = document.createElement("div");
    const selectTitle = document.createElement("div");
    const selectTitleH1 = document.createElement("h1");
    const selectText = document.createElement("div");
    const selectTextP = document.createElement("p");
    const input = document.createElement("input");

    select.classList.add("select");
    select.setAttribute("id", id);
    selectTitle.classList.add("select-title");
    selectText.classList.add("select-text");
    input.setAttribute("type", "checkbox");

    selectTitleH1.innerText = title;
    selectTextP.innerText = text;

    select.append(selectTitle);
    selectTitle.append(selectTitleH1);
    select.append(selectText);
    selectText.append(selectTextP);
    select.append(input);
    selectBody.append(select);
}

export function getTasksMain() {
    $.ajax({
        url: '../../php/task/getTasks.php',
        method: 'get',
        success: (data) => {
            let tasks = JSON.parse(data);

            for (let i = 0; i < tasks.length; i++) {
                let id = tasks[i]['id'];
                let title = tasks[i]['content']['title'];
                let text = tasks[i]['content']['text'];
                let date = new Date(tasks[i]['content']['deadline']);
                let deadline;
             
                if (date != "Invalid Date") {
                    deadline = date.getDate() + "." + (date.getMonth() + 1) + "." + date.getFullYear();
                } else {
                    deadline = "Бессрочно";
                }

                newTask(id, title, text, deadline);
            }
        }
    })
}

export function getTasksDelete() {
    $.ajax({
        url: '../../php/task/getTasks.php',
        method: 'get',
        success: (data) => {
            let tasks = JSON.parse(data);

            for (let i = 0; i < tasks.length; i++) {
                let id = tasks[i]['id'];
                let title = tasks[i]['content']['title'];
                let text = tasks[i]['content']['text'];
             
                newDeleteSection(id, title, text);
            }
        }
    })
}