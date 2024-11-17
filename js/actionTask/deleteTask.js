export function deleteTask() {
    const modal = document.getElementsByClassName("modal")[0];
    const formDelete = modal.getElementsByClassName("form-delete")[0];
    const btnDelete = formDelete.getElementsByTagName("button")[0];
    const select = formDelete.getElementsByClassName("select");

    btnDelete.onclick = () => {
        for (let i = 0; i < select.length; i++) {
            if (select[i].getElementsByTagName("input")[0].checked) {
                $.ajax({
                    url: '../../php/task/deleteTask.php',
                    method: 'post',
                    data: {'id': select[i].getAttribute('id')},
                    dataType: 'html',
                    cache: false,
                    success: () => {
                        location.reload();
                    }
                })
            }
        }   
    }
}