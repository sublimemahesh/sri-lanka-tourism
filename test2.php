<!DOCTYPE html>
<html>
    <head>
        <script src="http://vkontakte.ru/js/api/openapi.js" ></script>
        <style>
            .click-button{
                padding: 5px;
                background-color: #007700;
            }
        </style>
    </head>
    <body>
        <div class="click-button" onclick="VK.Auth.login(authorize);">Click</div>
        <script language="javascript">
         
                VK.init({
                    apiId: 6621664
                });
                function authorize(response) {
                    if (response.session) {
                        alert("Authorization denied");
                    } else {
                        alert("Authorization doen't denied");
                    }
                }

                VK.Api.call('friends.get', {fields: 'uid,first_name'}, function (data) {
                    alert(data.response.length);
                    if (data.error) {
                        alert(data.error.error_msg);
                    } else {
                        if (data.response.length > 0) {
                            for (i = 0; i < data.response.length; i++) {
                                alert(data.response[i]);
                                document.write("<p>" + data.response[i] + "</p>");
                            }
                        }
                    }
                });
                VK.UI.button('login_button');
        </script>
    </body>
</html>