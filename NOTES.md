Frontend tasks
==============
Firstly, I am going to complete the task for making the component acessible without changing the markup too much.
Accessibility could be achieved with a `select` element, but I believe you are looking for using aria labels so I have
decided to take that approach.

I have realised that I am getting a 500 error trying to access the server for data.
I can bypass this by creating a proxy response.

Backend tasks
=============
I would have used the postcode component for the registration but
since I can't get the API to work correctly I will just store the postcode on the user model.

## User log
I have made the command take an argument to allow you to select the number of users to return. It defaults to 10.
I didn't write tests for this command because it was an extremely simple task.
