/**
 * Created by MDABUTALHA on 6/10/2017.
 */
$(document).ready(function() {


    $(document).on('click', '.new-modal', function() {
        $('#footer_action_button_new').text("New");
        $('#footer_action_button_new').addClass('glyphicon-check');
        $('#footer_action_button_new').removeClass('glyphicon-trash');
        $('.actionBtnNew').addClass('btn-success');
        $('.actionBtnNew').removeClass('btn-danger');
        $('.actionBtnNew').addClass('new');
        $('.modal-title-new').text('New');

        $('#name').val($(this).data('name'));

        $('#myModalNew').modal('show');
    });





    $(document).on('click', '.edit-modal', function() {
        $('#footer_action_button_edit').text("Update");
        $('#footer_action_button_edit').addClass('glyphicon-check');
        $('#footer_action_button_edit').removeClass('glyphicon-trash');
        $('.actionBtnEdit').addClass('btn-success');
        $('.actionBtnEdit').removeClass('btn-danger');
        $('.actionBtnEdit').addClass('edit');
        $('.modal-title-edit').text('Edit');
        $('#fid').val($(this).data('id'));
        $('#n').val($(this).data('name'));
        $('#myModalEdit').modal('show');
    });





    $(document).on('click', '.delete-modal', function() {
        $('#footer_action_button_delete').text(" Delete");
        $('#footer_action_button_delete').removeClass('glyphicon-check');
        $('#footer_action_button_delete').addClass('glyphicon-trash');
        $('.actionBtnDelete').removeClass('btn-success');
        $('.actionBtnDelete').addClass('btn-danger');
        $('.actionBtnDelete').addClass('delete');
        $('.modal-title-delete').text('Delete');
        $('.did').text($(this).data('id'));
        $('.dname').html($(this).data('name'));
        $('#myModalDelete').modal('show');
    });




    $('.modal-footer-new').on('click', '.new', function() {

        $.ajax({
            type: 'post',
            url: '/addItem',
            data: {
                '_token': $('input[name=_token]').val(),
                'name': $('input[name=name]').val()
            },
            success: function(data) {
                if ((data.errors)){
                    $('.error').removeClass('hidden');
                    $('.error').text(data.errors.name);
                    //  console.log('sss')
                }
                else {
                    $('.error').addClass('hidden');
                    $('#table').append("<tr class='item" + data.id + "'><td>" + data.id + "</td><td>" + data.name + "</td><td><button class='edit-modal btn btn-info' data-id='" + data.id + "' data-name='" + data.name + "'><span class='glyphicon glyphicon-edit'></span> Edit</button> <button class='delete-modal btn btn-danger' data-id='" + data.id + "' data-name='" + data.name + "'><span class='glyphicon glyphicon-trash'></span> Delete</button></td></tr>");
                }
            },
        });

    });






    $('.modal-footer-edit').on('click', '.edit', function() {
        $.ajax({
            type: 'post',
            url: '/editItem',
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $("#fid").val(),
                'name': $('#n').val()
            },
            success: function(data) {
                $('.item' + data.id).replaceWith("<tr class='item" + data.id + "'><td>" + data.id + "</td><td>" + data.name + "</td><td><button class='edit-modal btn btn-info' data-id='" + data.id + "' data-name='" + data.name + "'><span class='glyphicon glyphicon-edit'></span> Edit</button> <button class='delete-modal btn btn-danger' data-id='" + data.id + "' data-name='" + data.name + "' ><span class='glyphicon glyphicon-trash'></span> Delete</button></td></tr>");
            }
        });
    });





    $('.modal-footer').on('click', '.delete', function() {
        $.ajax({
            type: 'post',
            url: '/deleteItem',
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $('.did').text()
            },
            success: function(data) {
                $('.item' + $('.did').text()).remove();
            }
        });
    });








});