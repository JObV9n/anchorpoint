$(document).ready(function () {
    customerList();

});
function customerList() {
    $.ajax({
        type: 'get',
        url: "customer/customer-list.php",
        success: function (data) {
            var response = JSON.parse(data);
            console.log(response);
            var tr = '';
            for (var i = 0; i < response.length; i++) {
                var id = response[i].id;
                var name = response[i].name;
                var email = response[i].email;
                var phone = response[i].phone;
                var address = response[i].address;
                var role = response[i].role;
                tr += '<tr>';
                tr += '<td>' + id + '</td>';
                tr += '<td>' + name + '</td>';
                tr += '<td>' + email + '</td>';
                tr += '<td>' + phone + '</td>';
                tr += '<td>' + address + '</td>';
                tr += '<td>' + role + '</td>';
                tr += '<td><div class="d-flex">';
                tr +=
                    '<a href="#viewCustomerModal" class="m-1 view" data-toggle="modal" onclick=viewEmployee("' +
                    id + '")><i class="fa" data-toggle="tooltip" title="view">&#xf06e;</i></a>';
                tr +=
                    '<a href="#editCustomerModal" class="m-1 edit" data-toggle="modal" onclick=viewEmployee("' +
                    id +
                    '")><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>';
                tr +=
                    '<a href="#deleteCustomerModal" class="m-1 delete" data-toggle="modal" onclick=$("#delete_id").val("' +
                    id +
                    '")><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>';
                tr += '</div></td>';
                tr += '</tr>';
            }
            $('.loading').hide();
            $('#customer_data').html(tr);
        }
    });
}

// function addCustomer() {
//     var name = $('.customer #name_input').val();
//     var email = $('.add_customer #email_input').val();
//     var phone = $('.add_customer #phone_input').val();
//     var address = $('.add_customer #address_input').val();
//     var role = $('.add_customer #role_input').val();

//     $.ajax({
//         type: 'post',
//         data: {
//             name: name,
//             email: email,
//             phone: phone,
//             address: address,
//             role: role,
//         },
//         url: "customer-add.php",
//         success: function (data) {
//             var response = JSON.parse(data);
//             $('#addCustomerModal').modal('hide');
//             customerList();
//             alert(response.message);
//         }

//     })
// }

function editCustomer() {
    var name = $('.edit_customer #name_input').val();
    var email = $('.edit_customer #email_input').val();
    var password = $('.edit_customer #password_input').val();
    var phone = $('.edit_customer #phone_input').val();
    var address = $('.edit_customer #address_input').val();
    // var customer_id = $('.edit_customer #employee_id').val();
    // var role = $('.edit_employee #role_input').val();

    $.ajax({
        type: 'post',
        data: {
            name: name,
            email: email,
            password:password,
            phone: phone,
            address: address,
            // customer_id: customer_id,
            // role: role,
        },
        url: "customer/customer-edit.php",
        success: function (data) {
            var response = JSON.parse(data);
            $('#editCustomerModal').modal('hide');
            customerList();
            alert(response.message);
        }

    })
}

function viewCustomer(id = 2) {
    $.ajax({
        type: 'get',
        data: {
            id: id,
        },
        url: "customer/customer-view.php",
        success: function (data) {
            var response = JSON.parse(data);
            $('.edit_customer #name_input').val(response.name);
            $('.edit_customer #email_input').val(response.email);
            $('.edit_customer #phone_input').val(response.phone);
            $('.edit_customer #address_input').val(response.address);
            $('.edit_customer #customer_id').val(response.id);
            // $('.edit_customer #role_input').val(response.role);
            $('.view_customer #name_input').val(response.name);
            $('.view_customer #email_input').val(response.email);
            $('.view_customer #phone_input').val(response.phone);
            $('.view_customer #address_input').val(response.address);
            // $('.view_customer #role_input').val(response.role);
        }
    })
}

function deleteCustomer() {
    var id = $('#delete_id').val();
    $('#deleteCustomerModal').modal('hide');
    $.ajax({
        type: 'get',
        data: {
            id: id,
        },
        url: "customer/customer-delete.php",
        success: function (data) {
            var response = JSON.parse(data);
            customerList();
            alert(response.message);
        }
    })
}