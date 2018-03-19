$(document).ready( function(){

    //csrf_token
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
//----------function Add()

    $(document).on('click', '.create-modal', function(){
        $('#createClientModal').modal('show');
        $('.form-horizontal').show();
        $('modal-title').text('Add a new Client');
    });

//---------- other function AddClient----------------------
$("#add").click(function(){
    $.ajax({
        type : 'POST',
        url  : '{{route('client.addClient')}}',
        data : {
            'name'      : $('input[name=name]').val(),
            'email'     : $('input[name=email]').val(),
            'address'   : $('input[name=address]').val(),
        },
        success: function(data)
        {
            console.log(data)
            $('#form-create-client').trigger('reset')

            var tr = $('<tr/>');
            tr.append($("<td/>",{
                text : data.id
            })).append($("<td/>",{
                text : data.name
            })).append($("<td/>",{
                text : data.email
            })).append($("<td/>",{
                html: "<a href='#'class='btn btn-info btn-sm' data-toggle='modal' data-target='#infoClientModal' data-id='"+data.id+"' data-name='"+data.name+"' data-email='"+data.email+"' data-address='"+data.address+"' id='info'> <span class='glyphicon glyphicon-eye-open'> </span> </a>" + " <a href='#'class='btn btn-warning btn-sm' data-toggle='modal' data-target='#editClientModal' data-id='"+data.id+"' data-name='"+data.name+"' data-email='"+data.email+"' data-address='"+data.address+"' id='edit'> <span class='glyphicon glyphicon-pencil'> </span> </a>" + " <a href='#'class='btn btn-danger btn-sm' data-toggle='modal' data-target='#deleteClientModal' data-id='"+data.id+"' data-name='"+data.name+"' data-email='"+data.email+"' data-address='"+data.address+"' id='del'> <span class='glyphicon glyphicon-trash'> </span> </a>"
            }))

            $('#clients-list').append(tr);
        },
        error: function(data)
        {
            var errors = data.responseJSON.errors;
            console.log(errors.name)
            if(errors.name){
                $('#createClientModal').find('#error-name').fadeIn().html(errors.name);

            }
            if(errors.email){
                $('#createClientModal').find('#error-email').fadeIn().html(errors.email);

            }
            if(errors.address){
                $('#createClientModal').find('#error-address').fadeIn().html(errors.address);

            }


        }
    })
});

//----------Edit client-----------------------------------
$(document).on('click', '#clients-list #edit', function(){

        var id = $(this).data('id');
        var name = $(this).data('name');
        var email = $(this).data('email');
        var address = $(this).data('address');
        $.post('{{ route('client.editClient') }}', {id:id, name:name}, function(data){
            $('#editClientModal').find('#id').val(data.id);
            $('#editClientModal').find('#name').val(data.name);
            $('#editClientModal').find('#email').val(data.email);
            $('#editClientModal').find('#address').val(data.address);

            $('#editClientModal').modal('show');
            $('#form-update-client').show();
            $('.modal-title').text('Edit a Client');
        });

});


//---------Update Client---------------------------------

$("#update").click(function(){
    $.ajax({
        type : 'POST',
        url  : '{{ route('client.updateClient') }}',
        datatype: 'json',
        data: $("#form-update-client").serialize(),
        success: function(data)
        {
            var tr = $('<tr/>');
            tr.append($("<td/>",{
                text : data.id
            })).append($("<td/>",{
                text : data.name
            })).append($("<td/>",{
                text : data.email
            })).append($("<td/>",{
                html: "<a href='#'class='btn btn-info btn-sm' data-toggle='modal' data-target='#infoClientModal' data-id='"+data.id+"' data-name='"+data.name+"' data-email='"+data.email+"' data-address='"+data.address+"' id='info'> <span class='glyphicon glyphicon-eye-open'> </span> </a>" + " <a href='#'class='btn btn-warning btn-sm' data-toggle='modal' data-target='#editClientModal' data-id='"+data.id+"' data-name='"+data.name+"' data-email='"+data.email+"' data-address='"+data.address+"' id='edit'> <span class='glyphicon glyphicon-pencil'> </span> </a>" + " <a href='#'class='btn btn-danger btn-sm' data-toggle='modal' data-target='#deleteClientModal' data-id='"+data.id+"' data-name='"+data.name+"' data-email='"+data.email+"' data-address='"+data.address+"' id='del'> <span class='glyphicon glyphicon-trash'> </span> </a>"
            }))

            $('#clients-list tr#client'+data.id).replaceWith(tr);
        }
    })
});

//--------------------Info Client-------------------------------------------
$(document).on('click', '#clients-list #info', function(){

        var id = $(this).data('id');
        var name = $(this).data('name');
        var email = $(this).data('email');
        var address = $(this).data('address');
        $.post('{{ route('client.infoClient') }}', {id:id}, function(data){
            $('#infoClientModal').find('p#id').html('<strong style="font-size:18px">ID:</strong> '+data.id);
            $('#infoClientModal').find('p#created_at').html('<strong style="font-size:18px">Cadastrado:</strong> '+data.created_at);
            if(data.created_at != data.updated_at)
            {
            $('#infoClientModal').find('p#updated_at').html('<strong style="font-size:18px">Editado:</strong> '+data.updated_at);
            }
            $('#infoClientModal').find('p#name').html('<strong style="font-size:18px">Name:</strong> '+data.name);
            $('#infoClientModal').find('p#email').html('<strong style="font-size:18px">Email:</strong> '+data.email);
            $('#infoClientModal').find('p#address').html('<strong style="font-size:18px">Address:</strong> '+data.address);

            $('#infoClientModal').modal('show');
            $('.modal-body').show();
            $('.modal-title').text('Info a Client');
        });

});

//---------------------Show modal delete-------------------------------------
$(document).on('click', '#clients-list #del', function(){

        var id = $(this).data('id');
        var name = $(this).data('name');
        var email = $(this).data('email');
        var address = $(this).data('address');
        $.post('{{ route('client.infoClient') }}', {id:id}, function(data){
            $('#deleteClientModal').find('input#id').val(data.id)
            $('#deleteClientModal').find('p#id').html('<strong style="font-size:18px">ID:</strong> '+data.id);
            $('#deleteClientModal').find('p#name').html('<strong style="font-size:18px">Name:</strong> '+data.name);
            $('#deleteClientModal').find('p#email').html('<strong style="font-size:18px">Email:</strong> '+data.email);
            $('#deleteClientModal').find('p#address').html('<strong style="font-size:18px">Address: </strong>'+data.address);

            $('#deleteClientModal').modal('show');
            $('.modal-body').show();
            $('.modal-title').text('Delete a Client');
        });

});

//--------------------Delete a client----------------------------------------

$("#delete").click(function(){
    $.ajax({
        type : 'POST',
        url  : '{{ route('client.destroyClient') }}',
        datatype: 'json',
        data : $("#form-delete-client").serialize(),
        success: function(data)
        {
            console.log(data)

            $('#clients-list tr#client'+data.id).remove();
            $('#deleteClientModal').modal('hide');
            location.reload();
        }
    })
});

});