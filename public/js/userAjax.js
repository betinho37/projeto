function loadData() {
    $.get(url + "/all", function(data) {
        for (var i = 0; i < data.length; i++) {
            var linha = `<tr id="user-${data[i].id}"><td>${data[i].id}</td><td>${data[i].name}</td><td>${data[i].email}</td><td>${data[i].created_at}</td>`;
            linha += `<td><button type="button" class="editButton btn btn-warning col-md-6" >Editar</button>`;
            linha += `<button type="button" class="removeButton btn btn-danger col-md-5" style='float: right;'>Remover</button></td></tr>`;
            var tabl = $('#users-table tr:last');
            tabl.after(linha);
        }

        onclickEditRefresh();

        onclickRemoveRefresh();
    })
}

function onclickEditRefresh() {
    $(".editButton").click(function() {
        var id = this.parentElement.parentElement.firstElementChild.innerHTML;
        $.get(url + "/info/" + id, function(data) {

            $('#Edit_id').val(data.id);
            $('#Edit_created_at').val(data.created_at);
            $('#Edit_name').val(data.name);
            $('#Edit_updated_at').val(data.updated_at);
            $('#Edit_email').val(data.email);

            $("#UserModal").modal();
        });
    });
}

function onclickRemoveRefresh() {
    $(".removeButton").click(function() {
        var id = this.parentElement.parentElement.firstElementChild.innerHTML;
        $("#RemoveModal").modal();

        $('#user-' + id).children();
        $("#confirmRemoveButton").click(function() {
            $.get(url + "/del/" + id, function(data) {
                if (data == 'done') {
                    $('#user-' + id).remove();
                    $("#RemoveModal").modal("hide");
                }
            });
        });
    });
}

$(document).ready(function() {


    $("#confirmEditButton").click(function() {

        var id = $('#Edit_id').val();
        var nome = $('#Edit_name').val();
        var mail = $('#Edit_email').val();

        $.post(url + "/update/" + id, { name: nome, email: mail, _token: csrf }, function(data) {
            var obj = $('#user-' + id).children();
            obj[1].innerText = nome;
            obj[2].innerText = mail;
            $("#UserModal").modal("hide");
        });
    });


    $("#new_email").change(function() {
        console.log('aaaaaaaaa');
        $.post(url + "/check", { email: $("#new_email").val(), _token: csrf }, function(data) {

            if (data == 'true') {
                $('#emailValidateNew').val('true');
                $('#warningNew').hide();
            } else {
                console.log(data);
                $('#emailValidateNew').val('false');
                $('#warningNew').toggle();
            }
        });
    });

    $("#newUserButton").click(function() {
        $("#NewUserModal").modal();
        $("#confirmNewButton").click(function() {
            var name = $('#new_name').val();
            var email = $('#new_email').val();
            var telefone = $('#new_telefone').val();
            var estadoid = $('#estadoid').val();
            var cidade = $('#new_cidade').val();

            $.post(url + "/store", { name: name, email: email, telefone: telefone, estadoid: estadoid, cidade: cidade, _token: csrf }, function(data) {

                var linha = `<tr id="user-${data.id}"><td>${data.id}</td><td>${data.name}</td><td>${data.email}</td><td>${data.created_at}</td>`;
                linha += `<td><button type="button" class="editButton btn btn-warning col-md-6" >Editar</button>`;
                linha += `<button type="button" class="removeButton btn btn-danger col-md-5" style='float: right;'>Remover</button></td></tr>`;
                var tabl = $('#users-table tr:last');
                tabl.after(linha);
                onclickRemoveRefresh();
                onclickEditRefresh();
                $("#NewUserModal").modal("hide");
            });

        });
    });

    loadData();


});