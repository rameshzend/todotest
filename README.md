Todo test:
=========

Following backend functionality has been completed:

- A to-do item must contain title, body, due date (optional), media/attachment, reminders (see below) and a complete/incomplete flag - done
- Must be able to fetch items with a complete/incomplete filter - done
- Must be able to create to-do items - done
- Must be able to edit to-do items - done
- Must be able to delete to-do items - done
- Must be able to mark a to-do item as done (so it is returned in the done list) - done
- To-do items should be ordered by due date (if set) - done
- Creators can opt-in to reminders (e.g. 1 day before, 2 weeks before etc), at which point an email is sent to the item owner - done
- User registration not required, sample user(s) can be seeded - done

I have implemented laravel's natively supported passport authentication for securing the RESTApi
Other approaches for securing the RESTApi can be JSON Web Token (JWT), Lumen micro servive api gateway

Files created:
------------------------

cronjob for reminders
-------------------------
app/Console/Commands/ReminderCron.php
app/Console/Kernel.php

controllers
-----------
app/Http/Controllers/Api/AuthController.php
app/Http/Controllers/Api/TaskController.php
app/Http/Controllers/TaskSchedulerController.php

Models
------
app/Models/Task.php
app/Models/User.php

views
-----
resources/views/reminders/todo_task.blade.php

migrations
----------
database/migrations


Curl examples:
=============

Login
-----
Request:
curl --location --request POST 'http://restpassport/api/login' \
--header 'Accept: application/json' \
--header 'Content-Type: application/x-www-form-urlencoded' \
--data-urlencode 'email=ramesh@ramesh.com' \
--data-urlencode 'password=ramesh'

Response:
{
    "user": {
        "id": 1,
        "name": "ramesh",
        "email": "ramesh@ramesh.com",
        "email_verified_at": null,
        "created_at": "2021-08-07T04:03:01.000000Z",
        "updated_at": "2021-08-07T04:03:01.000000Z"
    },
    "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiYjI1YWVlYTE4MmVmYTVkNGVlZThkYzc1YmNlNmIxOGI0MzEyZmU5OGMwNjI1ZDA5ZGUwM2RlMzljYjY5MDIxZTIxNGNjMTRmMTZkOTFkM2MiLCJpYXQiOjE2Mjg0MzcxMDcuNzEwMzcyOTI0ODA0Njg3NSwibmJmIjoxNjI4NDM3MTA3LjcxMDM4NjAzNzgyNjUzODA4NTkzNzUsImV4cCI6MTY1OTk3MzEwNy40Mjg1NDU5NTE4NDMyNjE3MTg3NSwic3ViIjoiMSIsInNjb3BlcyI6W119.yhEhWEo4fyxJA8-K3zsp2J_BaDK_PnS7WMYIWW5Q3UsGczHOhUKZt2MxMM4RgaVti-gkgNYvZyjAYAPsSRxFgTAgLtL0FmJfTySOUGkntrSs0yD5AyQBTxT9OewRWAOjr69Zf8mRlTqAvv_sC0uQUzQTGOzkp6XPyWAwh2wDKtrRhSRqWhEkyZKbidagDMnWT0lH-mbHuaLqkSejGiUVq4Ovz27bSWba-baqC5tYA8QBdRQlEWC25TV8ZfpU0HxXsp0r17FpST7iT3S5VxKPoez_I1Eoz0SxcQxfkEVpI3eg68iqLBdJvgI6VWqDVJCR3bhHrQ0UWU8VP7h7j_7O3SHg3I_MI1ZTjE-BSKb6L_dI7Y_tutBYU_gB5KHFOX6jTP-TeXMSFprzWfRVFi_1CoGM53Xoejkm3zXVkhI3eYWGEYROTqPG3ZmF6-CSrYSmoS6aZ9pLx9h-m6frH5PtpoI2VbDr09i6CVlJqDggVPQiW-qFgqbSZTcSne3MTwrf47fiv0y_3k5hyGzF7YQSPA1JvlJVFccaIhHKm_TMA1iDit1Xzvvq_FFx2uBo2Uy8VlYSBZ6KWmBW07d-kAO-5e0VSMldGLpXEqBOIQFXytFB3iqkyJ2QCK850vW-7FT-3UkvoGaTY8jTVA3VoMsuZ_Vv2jhfrqf1W8HAjO9QcDk"
}

Get all todo tasks
------------------
Request:
curl --location --request GET 'http://todotest/api/tasks/' \
--header 'Accept: application/json' \
--header 'Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiYzg1NzAzNzUzMjhkMTZlZWYxMzQ5Zjk5OGY3MjAxYzExMjE5M2VjODlmMzNlMDBjNDhhN2NmNTI5MGRiZWE2ZDcyMmJhZjk2ZDA2OWU4ODkiLCJpYXQiOjE2MjgzMzM3NjEuODgwNzAyMDE4NzM3NzkyOTY4NzUsIm5iZiI6MTYyODMzMzc2MS44ODA3MDk4ODY1NTA5MDMzMjAzMTI1LCJleHAiOjE2NTk4Njk3NjEuODU3MzU2MDcxNDcyMTY3OTY4NzUsInN1YiI6IjEiLCJzY29wZXMiOltdfQ.qIu6MeEiZau4cKeKWP1rbkmxpM4yZd2rguB7af79OP5Tb_4Wzur1-RpOT5QzCo1RL8w-96J0Tad7ASRSZlEZT0WgpI3VLpUTHihkqDEgw2gZxgABcjIqsFPLCpmjTXsVqGZo4Hu2KXj-L9ZOPwH7NXXcKhgOAieFlGyAYL5liz1MRmilK8z1B5iegCfRYXyDWx_FaGi55O4iDAS3sWV6SKAxTG_KSBGNOv7aNwCqGVO5yVGnm2nNYdTt5Z-K7oW4CWKZpFJ0ppSuegQo-7lpxtForUzt3U1C9tSRAQ6OhFbJfVK9aFYZXBrRwJfeS1tS97OeD1HQ4CddQBhtN-gPAFxuzVYlZr5fKeEcCFLDb0pqLGTLEpjPcOGrmGQvS-NVJUq8QINKyqLB45QjuP6og3esXPKmAq-KeA9RhRuy1Pf6InTqScZ19cYY7AYWKdGl0dt6y7KUKv3yXmwWP0txwdpboku-grLanjW8EbyvfxmjDUWa420YZrkFRdQL7VIDIZ3jOFlyFiuFHSJv-1JTshtpSTLfwyqobMZWiphlLviLuhvNJnyqdb7WeCXlbswuSxA01nh7kNTQUreDnM88-NLMhuj-Td5PVjDdjicx1f5o4FxBHhd9L3gO6o2jjsT6iDRKN100Qh4UhXUmydSmGAOCdbgf6OVXNVMNcwC0fsQ'

Response:
{
    "tasks": [
        {
            "id": 1,
            "user_id": 1,
            "title": "Todo test frontend functionality",
            "body": "Todo test frontend functionality",
            "due_date": "2021-08-12",
            "attachment": null,
            "reminders": "1 days",
            "status": 0,
            "created_at": "2021-08-08T14:00:34.000000Z",
            "updated_at": "2021-08-08T14:25:59.000000Z",
            "reminder_date": "2021-08-11"
        },
        {
            "id": 2,
            "user_id": 1,
            "title": "Todo test frontend functionality",
            "body": "Todo test frontend functionality",
            "due_date": "2021-08-20",
            "attachment": null,
            "reminders": "1 days",
            "status": 0,
            "created_at": "2021-08-08T14:12:19.000000Z",
            "updated_at": "2021-08-08T14:12:19.000000Z",
            "reminder_date": "2021-08-19"
        }
    ],
    "message": "Tasks have been retrieved successfully"
}
 
Create todo task
----------------
Request:
curl --location --request POST 'http://todotest/api/tasks' \
--header 'Accept: application/json' \
--header 'Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiYzg1NzAzNzUzMjhkMTZlZWYxMzQ5Zjk5OGY3MjAxYzExMjE5M2VjODlmMzNlMDBjNDhhN2NmNTI5MGRiZWE2ZDcyMmJhZjk2ZDA2OWU4ODkiLCJpYXQiOjE2MjgzMzM3NjEuODgwNzAyMDE4NzM3NzkyOTY4NzUsIm5iZiI6MTYyODMzMzc2MS44ODA3MDk4ODY1NTA5MDMzMjAzMTI1LCJleHAiOjE2NTk4Njk3NjEuODU3MzU2MDcxNDcyMTY3OTY4NzUsInN1YiI6IjEiLCJzY29wZXMiOltdfQ.qIu6MeEiZau4cKeKWP1rbkmxpM4yZd2rguB7af79OP5Tb_4Wzur1-RpOT5QzCo1RL8w-96J0Tad7ASRSZlEZT0WgpI3VLpUTHihkqDEgw2gZxgABcjIqsFPLCpmjTXsVqGZo4Hu2KXj-L9ZOPwH7NXXcKhgOAieFlGyAYL5liz1MRmilK8z1B5iegCfRYXyDWx_FaGi55O4iDAS3sWV6SKAxTG_KSBGNOv7aNwCqGVO5yVGnm2nNYdTt5Z-K7oW4CWKZpFJ0ppSuegQo-7lpxtForUzt3U1C9tSRAQ6OhFbJfVK9aFYZXBrRwJfeS1tS97OeD1HQ4CddQBhtN-gPAFxuzVYlZr5fKeEcCFLDb0pqLGTLEpjPcOGrmGQvS-NVJUq8QINKyqLB45QjuP6og3esXPKmAq-KeA9RhRuy1Pf6InTqScZ19cYY7AYWKdGl0dt6y7KUKv3yXmwWP0txwdpboku-grLanjW8EbyvfxmjDUWa420YZrkFRdQL7VIDIZ3jOFlyFiuFHSJv-1JTshtpSTLfwyqobMZWiphlLviLuhvNJnyqdb7WeCXlbswuSxA01nh7kNTQUreDnM88-NLMhuj-Td5PVjDdjicx1f5o4FxBHhd9L3gO6o2jjsT6iDRKN100Qh4UhXUmydSmGAOCdbgf6OVXNVMNcwC0fsQ' \
--header 'Content-Type: application/x-www-form-urlencoded' \
--data-urlencode 'title=Todo test backend functionality' \
--data-urlencode 'body=Todo test backend functionality' \
--data-urlencode 'user_id=1' \
--data-urlencode 'reminders=1 days' \
--data-urlencode 'due_date=2021-08-15'

Response:
{
    "task": {
        "title": "Todo test frontend functionality",
        "body": "Todo test frontend functionality",
        "user_id": "1",
        "reminders": "1 days",
        "due_date": "2021-08-20",
        "reminder_date": "2021-08-19",
        "updated_at": "2021-08-08T14:12:19.000000Z",
        "created_at": "2021-08-08T14:12:19.000000Z",
        "id": 2
    },
    "message": "Task has been created successfully"
}

Update todo task
----------------
Request:
curl --location --request PUT 'http://todotest/api/tasks/1' \
--header 'Accept: application/json' \
--header 'Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiYzg1NzAzNzUzMjhkMTZlZWYxMzQ5Zjk5OGY3MjAxYzExMjE5M2VjODlmMzNlMDBjNDhhN2NmNTI5MGRiZWE2ZDcyMmJhZjk2ZDA2OWU4ODkiLCJpYXQiOjE2MjgzMzM3NjEuODgwNzAyMDE4NzM3NzkyOTY4NzUsIm5iZiI6MTYyODMzMzc2MS44ODA3MDk4ODY1NTA5MDMzMjAzMTI1LCJleHAiOjE2NTk4Njk3NjEuODU3MzU2MDcxNDcyMTY3OTY4NzUsInN1YiI6IjEiLCJzY29wZXMiOltdfQ.qIu6MeEiZau4cKeKWP1rbkmxpM4yZd2rguB7af79OP5Tb_4Wzur1-RpOT5QzCo1RL8w-96J0Tad7ASRSZlEZT0WgpI3VLpUTHihkqDEgw2gZxgABcjIqsFPLCpmjTXsVqGZo4Hu2KXj-L9ZOPwH7NXXcKhgOAieFlGyAYL5liz1MRmilK8z1B5iegCfRYXyDWx_FaGi55O4iDAS3sWV6SKAxTG_KSBGNOv7aNwCqGVO5yVGnm2nNYdTt5Z-K7oW4CWKZpFJ0ppSuegQo-7lpxtForUzt3U1C9tSRAQ6OhFbJfVK9aFYZXBrRwJfeS1tS97OeD1HQ4CddQBhtN-gPAFxuzVYlZr5fKeEcCFLDb0pqLGTLEpjPcOGrmGQvS-NVJUq8QINKyqLB45QjuP6og3esXPKmAq-KeA9RhRuy1Pf6InTqScZ19cYY7AYWKdGl0dt6y7KUKv3yXmwWP0txwdpboku-grLanjW8EbyvfxmjDUWa420YZrkFRdQL7VIDIZ3jOFlyFiuFHSJv-1JTshtpSTLfwyqobMZWiphlLviLuhvNJnyqdb7WeCXlbswuSxA01nh7kNTQUreDnM88-NLMhuj-Td5PVjDdjicx1f5o4FxBHhd9L3gO6o2jjsT6iDRKN100Qh4UhXUmydSmGAOCdbgf6OVXNVMNcwC0fsQ' \
--header 'Content-Type: application/x-www-form-urlencoded' \
--data-urlencode 'title=Todo test frontend functionality' \
--data-urlencode 'body=Todo test frontend functionality' \
--data-urlencode 'user_id=1' \
--data-urlencode 'due_date=2021-08-12'

Response:
{
    "task": {
        "id": 1,
        "user_id": "1",
        "title": "Todo test frontend functionality",
        "body": "Todo test frontend functionality",
        "due_date": "2021-08-12",
        "attachment": null,
        "reminders": "1 days",
        "status": 0,
        "created_at": "2021-08-08T14:00:34.000000Z",
        "updated_at": "2021-08-08T14:25:59.000000Z",
        "reminder_date": "2021-08-11"
    },
    "message": "Task has been updated successfully"
}

Delete todo task
----------------
Request:
curl --location --request DELETE 'http://todotest/api/tasks/1' \
--header 'Accept: application/json' \
--header 'Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiYzg1NzAzNzUzMjhkMTZlZWYxMzQ5Zjk5OGY3MjAxYzExMjE5M2VjODlmMzNlMDBjNDhhN2NmNTI5MGRiZWE2ZDcyMmJhZjk2ZDA2OWU4ODkiLCJpYXQiOjE2MjgzMzM3NjEuODgwNzAyMDE4NzM3NzkyOTY4NzUsIm5iZiI6MTYyODMzMzc2MS44ODA3MDk4ODY1NTA5MDMzMjAzMTI1LCJleHAiOjE2NTk4Njk3NjEuODU3MzU2MDcxNDcyMTY3OTY4NzUsInN1YiI6IjEiLCJzY29wZXMiOltdfQ.qIu6MeEiZau4cKeKWP1rbkmxpM4yZd2rguB7af79OP5Tb_4Wzur1-RpOT5QzCo1RL8w-96J0Tad7ASRSZlEZT0WgpI3VLpUTHihkqDEgw2gZxgABcjIqsFPLCpmjTXsVqGZo4Hu2KXj-L9ZOPwH7NXXcKhgOAieFlGyAYL5liz1MRmilK8z1B5iegCfRYXyDWx_FaGi55O4iDAS3sWV6SKAxTG_KSBGNOv7aNwCqGVO5yVGnm2nNYdTt5Z-K7oW4CWKZpFJ0ppSuegQo-7lpxtForUzt3U1C9tSRAQ6OhFbJfVK9aFYZXBrRwJfeS1tS97OeD1HQ4CddQBhtN-gPAFxuzVYlZr5fKeEcCFLDb0pqLGTLEpjPcOGrmGQvS-NVJUq8QINKyqLB45QjuP6og3esXPKmAq-KeA9RhRuy1Pf6InTqScZ19cYY7AYWKdGl0dt6y7KUKv3yXmwWP0txwdpboku-grLanjW8EbyvfxmjDUWa420YZrkFRdQL7VIDIZ3jOFlyFiuFHSJv-1JTshtpSTLfwyqobMZWiphlLviLuhvNJnyqdb7WeCXlbswuSxA01nh7kNTQUreDnM88-NLMhuj-Td5PVjDdjicx1f5o4FxBHhd9L3gO6o2jjsT6iDRKN100Qh4UhXUmydSmGAOCdbgf6OVXNVMNcwC0fsQ'

Response:
{
    "message": "Task has been deleted"
}

