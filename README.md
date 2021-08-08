Curl examples:

Get all todos:
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
 
Create todo:
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

Update todo:
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

Delete todo task:
Request:
curl --location --request DELETE 'http://todotest/api/tasks/1' \
--header 'Accept: application/json' \
--header 'Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiYzg1NzAzNzUzMjhkMTZlZWYxMzQ5Zjk5OGY3MjAxYzExMjE5M2VjODlmMzNlMDBjNDhhN2NmNTI5MGRiZWE2ZDcyMmJhZjk2ZDA2OWU4ODkiLCJpYXQiOjE2MjgzMzM3NjEuODgwNzAyMDE4NzM3NzkyOTY4NzUsIm5iZiI6MTYyODMzMzc2MS44ODA3MDk4ODY1NTA5MDMzMjAzMTI1LCJleHAiOjE2NTk4Njk3NjEuODU3MzU2MDcxNDcyMTY3OTY4NzUsInN1YiI6IjEiLCJzY29wZXMiOltdfQ.qIu6MeEiZau4cKeKWP1rbkmxpM4yZd2rguB7af79OP5Tb_4Wzur1-RpOT5QzCo1RL8w-96J0Tad7ASRSZlEZT0WgpI3VLpUTHihkqDEgw2gZxgABcjIqsFPLCpmjTXsVqGZo4Hu2KXj-L9ZOPwH7NXXcKhgOAieFlGyAYL5liz1MRmilK8z1B5iegCfRYXyDWx_FaGi55O4iDAS3sWV6SKAxTG_KSBGNOv7aNwCqGVO5yVGnm2nNYdTt5Z-K7oW4CWKZpFJ0ppSuegQo-7lpxtForUzt3U1C9tSRAQ6OhFbJfVK9aFYZXBrRwJfeS1tS97OeD1HQ4CddQBhtN-gPAFxuzVYlZr5fKeEcCFLDb0pqLGTLEpjPcOGrmGQvS-NVJUq8QINKyqLB45QjuP6og3esXPKmAq-KeA9RhRuy1Pf6InTqScZ19cYY7AYWKdGl0dt6y7KUKv3yXmwWP0txwdpboku-grLanjW8EbyvfxmjDUWa420YZrkFRdQL7VIDIZ3jOFlyFiuFHSJv-1JTshtpSTLfwyqobMZWiphlLviLuhvNJnyqdb7WeCXlbswuSxA01nh7kNTQUreDnM88-NLMhuj-Td5PVjDdjicx1f5o4FxBHhd9L3gO6o2jjsT6iDRKN100Qh4UhXUmydSmGAOCdbgf6OVXNVMNcwC0fsQ'

Response:
{
    "message": "Task has been deleted"
}

