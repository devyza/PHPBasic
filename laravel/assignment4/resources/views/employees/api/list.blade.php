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
                async: true,
                dataType: 'json',
                success:function(res) {
                    res.forEach(employee => {
                        if (employee.deleted_at === null) {
                            $('tbody').append( '<tr>' +
                            '<td>' + employee.id + '</td>' +
                            '<td>' + employee.name + '</td>' +
                            '<td>' + employee.jobTitle + '</td>' +
                            '<td>' + employee.email + '</td>' +
                            '<td>' + employee.nationality + '</td>' +
                            '<td>' + employee.company_name + '</td>' +
                            '<td><a href="/api/employee/list/delete/' + employee.id + '">Delete</a></td>'
                                + '</tr>');
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
        <form action="/api/employee/list/add" method="POST">
            {{ csrf_field() }}
            <div>
                <label for="name">Name</label>
                <input type="text" name="name" placeholder="Name">
            </div>
            <div>
                <label for="jobTitle">Job Title</label>
                <input type="text" name="jobTitle" placeholder="Job Title">
            </div>
            <div>
                <label for="email">Email</label>
                <input type="email" name="email" placeholder="Email">
            </div>
            <div>
                <label for="nationality">Nationality</label>
                <input type="text" name="nationality" placeholder="Nationality">
            </div>
                <div>
                    <label for="company">Company</label>
                    <input type="number" name="company_id" placeholder="Company">
                </div>
            </div>
                <input type="submit" value="Save" name="sbtSave">
            </div>
        </form>

        <h2>Update</h2>
        <form action="/api/employee/list/edit/" method="POST">
            {{ csrf_field() }}
            <div>
                <label for="id">ID</label>
                <input type="text" name="id" placeholder="ID">
            </div>
            <div>
                <label for="name">Name</label>
                <input type="text" name="name" placeholder="Name">
            </div>
            <div>
                <label for="jobTitle">Job Title</label>
                <input type="text" name="jobTitle" placeholder="Job Title">
            </div>
            <div>
                <label for="email">Email</label>
                <input type="email" name="email" placeholder="Email">
            </div>
            <div>
                <label for="nationality">Nationality</label>
                <input type="text" name="nationality" placeholder="Nationality">
            </div>
                <div>
                    <label for="company">Company</label>
                    <input type="number" name="company_id" placeholder="Company">
                </div>
            </div>
                <input type="submit" value="Update" name="sbtUpdate">
            </div>
        </form>
    </body>
</html>