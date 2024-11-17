import { getTasksMain, getTasksDelete } from './actionTask/getTasks.js';
import { deleteTask } from "./actionTask/deleteTask.js";
import { viewActions } from './viewActionsProfile.js';

const modal = document.getElementsByClassName("modal")[0];
const modalAdd = modal.getElementsByClassName("form-add")[0];
const modalDelete = modal.getElementsByClassName("form-delete")[0];
const modalSetting = modal.getElementsByClassName("form-setting")[0];
const modalClose = modal.getElementsByClassName("modal-close")[0];
const selectTask = modalDelete.getElementsByClassName("select-body")[0].getElementsByClassName("select");
const btnSaveSettings = document.getElementById("saveSettings");

const viewModalAdd = () => {
    modal.style.display = "flex";
    modalAdd.style.display = "flex";

    modalClose.onclick = () => {
        modal.style.display = "none";
        modalAdd.style.display = "none";
    }
}

const viewModalDelete = () => {
    modal.style.display = "flex";
    modalDelete.style.display = "block";
    
    for (let i = 0; i < selectTask.length; i++) {
        selectTask[i].onclick = () => {
            selectTask[i].getElementsByTagName("input")[0].checked = true;
            selectTask[i].style.background = "var(--section-background-3)";
            selectTask[i].getElementsByTagName("h1")[0].style.color = "#fff";
            selectTask[i].getElementsByTagName("p")[0].style.color = "#fff";
        }
        
    }

    deleteTask();

    modalClose.onclick = () => {
        modal.style.display = "none";
        modalDelete.style.display = "none";
    }
}

const viewModalSetting = () => {
    modal.style.display = "flex";
    modalSetting.style.display = "flex";

    btnSaveSettings.onclick = () => {
        const inputLogin = modalSetting.getElementsByTagName("input")[0].value;
        const inputEmail = modalSetting.getElementsByTagName("input")[1].value;
        const inputPassword = modalSetting.getElementsByTagName("input")[2].value;
        const inputPasswordCheck = modalSetting.getElementsByTagName("input")[3].value;

        if (inputPassword != inputPasswordCheck) {
            return 0;
        }

        $.ajax({
            url: '../php/user/saveSettings.php',
            method: 'POST',
            cahce: false,
            data: {
                login: inputLogin,
                email: inputEmail,
                password: inputPassword
            },
            dataType: 'html',
            success: () => {
                document.getElementsByClassName("form-success")[0].style.display = "flex";
                setTimeout(() => location.reload(), 2000);
            }
        })
    }

    modalClose.onclick = () => {
        modal.style.display = "none";
        modalSetting.style.display = "none";
    }
}

window.onload = () => {
    getTasksMain();
    getTasksDelete();

    const btnAddTask = document.getElementById("add");
    const btnDeleteTask = document.getElementById("delete");
    const btnSetting = document.getElementById("setting");
    const headerProfile = document.getElementsByClassName("header-greating")[0];

    btnAddTask.onclick = () => viewModalAdd();
    btnDeleteTask.onclick = () => viewModalDelete();
    headerProfile.onclick = () => viewActions();
    btnSetting.onclick = () => viewModalSetting();
}