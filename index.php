<!DOCTYPE html>
<html>
<head>
    <title>Payment Form</title>
    <style>
        .form-group {
            margin-bottom: 20px;
            width: 40%;
        }

        .form-group label {
            display: block;
        }

        .form-group input {
            width: 100%;
            padding: 8px;
        }

        .amount-field {
            background-color: #f5f5f5;
            cursor: not-allowed;
        }
    </style>
</head>
<body>
    <h1>Payment Form</h1>
    <form action="tinypesastk.php" method="POST">
        <div class="form-group">
            <label for="phone">Phone Number:</label>
            <input type="text" name="phone" id="phone" placeholder="Enter your phone number" required>
        </div>

        <div class="form-group">
            <label for="amount">Amount:</label>
            <input class="amount-field" type="text" name="amount" id="amount" value="1" readonly>
        </div>

        <button type="submit">Make Payment</button>
    </form>
</body>
</html>
