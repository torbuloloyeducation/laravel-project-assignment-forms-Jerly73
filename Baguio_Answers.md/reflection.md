Answer the following:

1. What is the difference between GET and POST?
GET is used to get data and you can see it in the URL and POST is used to send data like forms, and the data is not shown in the URL.

2. Why do we use `@csrf` in forms?
We use @csrf to protect the form from fake or unauthorized requests. It ensures that the request comes from the same application and prevents hackers from submitting fake requests.

3. What is session used for in this activity?
Session is used to temporarily store the emails entered by the user. It allows the data to persist even after the page reloads without using a database.


4. What happens if session is cleared?
If the session is cleared, all the saved emails will be deleted and the list will be empty.