<!DOCTYPE html>
<html>
<head>
    <title>Chatbox</title>
    <style>
                * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f9f9f9;
        }

                #chatbox {
            width: 500px;
            height: 200px;
            border: 1px solid #ccc;
            padding: 10px;
            overflow-y: auto;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        #chatbox p {
            margin-bottom: 10px;
            padding: 5px;
            border-bottom: 1px solid #ccc;
        }
        #chatbox p:last-child {
            border-bottom: none;
        }

                #chat-form {
            margin-top: 10px;
        }
        #chat-form input[type="text"] {
            width: 31.5%;
            height: 85px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        #chat-form button[type="submit"] {
            width: 10%;
            height: 30px;
            padding: 5px;
            border: none;
            border-radius: 5px;
            background-color: #1c1c84;
            color: #fff;
            cursor: pointer;
        }
        #chat-form button[type="submit"]:hover {
            background-color: #3e8e41;
        }
    </style>
</head>
<body>
   
    <br><form id="chat-form">
        <input type="text" id="message" name="message" placeholder="Type a message...">

        
    <br><br><button type="submit">Send</button>
    </form>
    
    <br><div id="chatbox">
        
    </div>
    
    <script src="https:
    <script>
        $(document).ready(function() {
            $('#chat-form').submit(function(e) {
                e.preventDefault();
                var message = $('#message').val();
                $.ajax({
                    type: 'POST',
                    url: 'insert_data.php',
                    data: {message: message},
                    success: function(data) {
                        $('#chatbox').append('<p>' + data + '</p>');
                        $('#message').val('');
                    }
                });
            });
        });
    </script>
</body>
</html>