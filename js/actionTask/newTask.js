const modal = document.getElementsByClassName("modal")[0];
const formAdd = modal.getElementsByClassName("form-add")[0];
const btnCreate = formAdd.getElementsByTagName("button")[0];
const inputDeadline = formAdd.getElementsByTagName("input")[1];

let date = new Date();
let nowDate = date.getFullYear() + "-" + (date.getMonth() + 1) + "-" + date.getDate();
inputDeadline.setAttribute("min", nowDate);

btnCreate.onclick = () => {
    const dataTitle = formAdd.getElementsByTagName("input")[0].value;
    const dataText = formAdd.getElementsByTagName("textarea")[0].value;
    const dataDeadline = formAdd.getElementsByTagName("input")[1].value;

    $.ajax({
        url: '../../php/task/newTask.php',
        method: 'post',
        data: {
            taskTitle: dataTitle,
            taskText: dataText,
            taskDeadline: dataDeadline 
        },
        dataType: 'html',
        success: () => {
            location.reload();
        }
    })   
}