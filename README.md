# M-pesa-stk-push-API
GitHub repo for M-Pesa STK Push Integration - Accept Payments through M-Pesa STK Push API

1.Create an account from the Safaricom Daraja Portal or login to your account to get API Credentials(consumer_key and consumer_secret).
2.Create a Test App from the portal to get the test credentials.
3.Replace the comments with the actual credentials in the AccessToken.php file
4. You can now test. It should work perfectly.

NB:// To receive callbacks through the callback url the callback.php file needs to be in an active domain or you can use secure tunnels such as ngrok to expose the file publicly.

5.The callback file receives data in json format and decodes it and further saves it to the database in the transactions table.

NB:// Remember to import the database so you use it or create your own alternatively. 


