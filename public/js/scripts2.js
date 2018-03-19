$(document).ready(function(){
    $('#confirm').on('click', function () {
        return confirm('Are you sure?');
    });
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

            $('#form-create-client').trigger('reset')

            var tr = $('<tr/>');
            tr.append($("<td/>",{
                text : data.id
            })).append($("<td/>",{
                text : data.name
            })).append($("<td/>",{
                text : data.email
            })).append($("<td/>",{
                html: "<a href='#'class='btn btn-info btn-sm' data-toggle='modal' data-target='#exampleModal' data-id='"+data.id+"' data-name='"+data.name+"' data-email='"+data.email+"' data-address='"+data.address+"'> <span class='glyphicon glyphicon-eye-open'> </span> </a>" + " <a href='#'class='btn btn-warning btn-sm' data-toggle='modal' data-target='#' data-id='"+data.id+"' data-name='"+data.name+"' data-email='"+data.email+"' data-address='"+data.address+"'> <span class='glyphicon glyphicon-pencil'> </span> </a>" + " <a href='#'class='btn btn-danger btn-sm' data-toggle='modal' data-target='#' data-id='"+data.id+"' data-name='"+data.name+"' data-email='"+data.email+"' data-address='"+data.address+"'> <span class='glyphicon glyphicon-trash'> </span> </a>"
            }))

            $('#clients-list').append(tr);
        }
    })
});

//----------Edit client-----------------------------------
$(document).on('click', '#clients-list #edit', function(){

        var id = $(this).data('id');
        var name = $(this).data('name');
        var email = $(this).data('email');
        var address = $(this).data('address');
        $.post('{{ route('client.editClient') }}', {id:id}, function(data){
            $('#editClientModal').find('#id').val(data.id);
            $('#editClientModal').find('#name').val(data.name);
            $('#editClientModal').find('#email').val(data.email);
            $('#editClientModal').find('#address').val(data.address);

            $('#editClientModal').modal('show');
            $('#form-update-client').show();
            $('modal-title').text('Edit a Client');
        })

});

//---------Update Client---------------------------------
$("#update").click(function(){
    $.ajax({
        type : 'POST',
        url  : '{{ route('client.updateClient') }}',
        data : {
            'id'     : $('input[name=id]').val(),
            'name'   : $('input[name=name]').val(),
            'email'  : $('input[name=email]').val(),
            'address': $('input[name=address]').val(),
        },

        success: function(data)
        {
            console.log(data)
            var tr = $('<tr/>');
            tr.append($("<td/>",{
                text : data.id
            })).append($("<td/>",{
                text : data.name
            })).append($("<td/>",{
                text : data.email
            })).append($("<td/>",{
                html: "<a href='#'class='btn btn-info btn-sm' data-toggle='modal' data-target='#exampleModal' data-id='"+data.id+"' data-name='"+data.name+"' data-email='"+data.email+"' data-address='"+data.address+"'> <span class='glyphicon glyphicon-eye-open'> </span> </a>" + " <a href='#'class='btn btn-warning btn-sm' data-toggle='modal' data-target='#' data-id='"+data.id+"' data-name='"+data.name+"' data-email='"+data.email+"' data-address='"+data.address+"'> <span class='glyphicon glyphicon-pencil'> </span> </a>" + " <a href='#'class='btn btn-danger btn-sm' data-toggle='modal' data-target='#' data-id='"+data.id+"' data-name='"+data.name+"' data-email='"+data.email+"' data-address='"+data.address+"'> <span class='glyphicon glyphicon-trash'> </span> </a>"
            }))

            $('#clients-list tr#client'+data.id).replaceWith(tr);
        }
    })
});