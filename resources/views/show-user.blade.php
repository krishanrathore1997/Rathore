<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf" content="{{ csrf_token() }}" />
    <title>Document</title>
    @include('main.link')
</head>
<body>
    @include('main.sidebar')
      
    <section>
        <div class="container">
            <table class="table" id="demo">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>   
                        <th scope="col">City</th>
                        <th scope="col">Handle</th>
                    </tr>
                </thead>
                <tbody id="data">
                    <!-- Table body will be populated dynamically with JavaScript -->
                </tbody>
            </table>    
        </div>    
    </section>   

    @include('main.script')
<script>
    getText("http://rathore.com/api/show-user");

    async function getText(file) {
        try {
            let response = await fetch(file);
            let data = await response.json();

            let user = "";
            
            // Check if data.users exists, adjust accordingly based on the actual structure
            if (data.users && Array.isArray(data.users)) {
                data.users.forEach(userdata => {
                    user += `<tr>
                                <td>${userdata.id}</td>
                                <td>${userdata.name}</td>
                                <td>${userdata.city}</td>
                                <td>${userdata.handle}</td>
                            </tr>`;
                });
            } else {
                console.error('Error: Invalid data structure');
            }

            document.getElementById("data").innerHTML = user;
        } catch (error) {
            console.error('Error:', error);
        }
    }
</script>
</body>
</html>
