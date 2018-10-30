# TODOLIST APP

This is a todolist application made with php and bootstrap.

# Instructions
* You need to enable apache rewrite mod
* Download / Fork / Clone the repo
* If your_path !== TODOLIST, you must rename the BASE_URL const into /global.php
* Go to localhost/TODOLIST/, it will redirect you to localhost/TODOLIST/install/
* Follow installation instructions

# Installation permissions denied
#### You have two options.
##### First option:
* Give permissions to /install/ and /config/ recursively
##### Second option:
* Delete /install/ dir
* Replace /config/config.php file with your own MySQL ids. Don't forget to switch INSTALL const to 1 (true)
* Go to localhost/TODOLIST/register and create your account
