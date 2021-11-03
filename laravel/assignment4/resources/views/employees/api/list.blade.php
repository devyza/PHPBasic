<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Hello</title>
        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script>
            $.ajax({
                type: 'GET',
                url: '/api/employee/list',
                dataType: 'json',
                success:function(res) {
                    res.forEach(employee => {
                        if (employee.deleted_at === null) {

                            $('tbody').append(`<tr>
                                <td>${employee.id}</td>
                                <td>${employee.name}</td> 
                                <td>${employee.jobTitle}</td> 
                                <td>${employee.email}</td> 
                                <td>${employee.nationality}</td> 
                                <td>${employee.company_name}</td> 
                                <td><button onclick="deleteEmployee(${employee.id})">Delete</button>`);
                        }
                    });
                }   
            });
        </script>
    </head>
    <body>
        <table>
            <thead>
                <td>ID</td>
                <td>Name</td>
                <td>Job Title</td>
                <td>Email</td>
                <td>Nationality</td>
                <td>Company Name</td>
            <thead>
            <tbody><tbody>
        </table>

        <h2>Add</h2>
        <form>
            {{ csrf_field() }}
            <div>
                <label for="name">Name</label>
                <input type="text" name="name" placeholder="Name" id="txtName">
            </div>
            <div>
                <label for="jobTitle">Job Title</label>
                <input type="text" name="jobTitle" placeholder="Job Title" id="txtJobTitle">
            </div>
            <div>
                <label for="email">Email</label>
                <input type="text" name="email" placeholder="Email" id="txtEmail">
            </div>
            <div>
                <label for="nationality">Nationality</label>
                <input type="text" name="nationality" placeholder="Nationality" id="txtNationality">
            </div>
                <div>
                    <label for="company">Company</label>
                    <input type="text" name="company_id" placeholder="Company" id="txtCompany">
                </div>
            </div>
                <button id=btnSave>Save</button>
            </div>
        </form>

        <h2>Update</h2>
        <form>
            {{ csrf_field() }}
            <div>
                <label for="id">ID</label>
                <input type="text" name="id" placeholder="ID" id="txtUpdateID">
            </div>
            <div>
                <label for="name">Name</label>
                <input type="text" name="name" placeholder="Name" id="txtUpdateName">
            </div>
            <div>
                <label for="jobTitle">Job Title</label>
                <input type="text" name="jobTitle" placeholder="Job Title" id="txtUpdateJobTitle">
            </div>
            <div>
                <label for="email">Email</label>
                <input type="text" name="email" placeholder="Email" id="txtUpdateEmail">
            </div>
            <div>
                <label for="nationality">Nationality</label>
                <input type="text" name="nationality" placeholder="Nationality" id="txtUpdateNationality">
            </div>
                <div>
                    <label for="company">Company</label>
                    <input type="text" name="company_id" placeholder="Company" id="txtUpdateCompany">
                </div>
            </div>
                <button id="btnUpdate">Update</button>
            </div>
        </form>

        <script>

            $("#btnSave").click( function() {
                var dataArray = {
                    'name': txtName.value, 'jobTitle': txtJobTitle.value, 'email': txtEmail.value,
                    'nationality': txtNationality.value, 'company_id': txtCompany.value
                }

                $.ajax({
                    type: 'POST',
                    url: '/api/employee/list/add/',
                    data: dataArray,
                    dataType: 'json',
                    success:function(result) {
                        alert(result['msg']);
                        location.reload();
                    },
                    error:function(result) {
                        alert("Fail");
                    }
                });
            });

            $("#btnUpdate").click( function() {

                var dataArray = {
                    'id': txtUpdateID.value, 'name': txtUpdateName.value, 
                    'jobTitle': txtUpdateJobTitle.value, 'email': txtUpdateEmail.value,
                    'nationality': txtUpdateNationality.value, 'company_id': txtUpdateCompany.value
                }

                $.ajax({
                    type: 'POST',
                    url: '/api/employee/list/edit/',
                    data: dataArray,
                    dataType: 'json',
                    success:function(result) {
                        alert(result['msg']);
                        location.reload();
                    },
                    error:function(result) {
                        alert("Fail");
                    }
                });
                
            });

            function deleteEmployee(id) {
                $.ajax({
                    type: 'GET',
                    url: `/api/employee/list/delete/${id}`,
                    dataType: 'json',
                    success:function(result) {
                        console.log(result);
                        alert(result['msg']);
                        location.reload();
                    },
                    error:function(result) {
                        alert("Fail");
                    }
                });
            };
        </script>

    </body>
</html>