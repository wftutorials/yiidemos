# YII demos

A list of demos using the `yii 1.1` framework.

# Todo demos

![todo](https://yii.wftutorials.com/uploads/2020/06/vwja25.png)

In this demo we create a task application. 
* create a task
* set task as completed
* view completed tasks
* view overdue tasks
* delete tasks

## Files
**Models** - In this tutorial we worked with the `ToDo.php` model.

**Controllers** - In this tutorial we worked with the `TodoController.php`.

**Views**
In this tutorial we created the following views in the `toDo` views directory
* _form.php
* completed.php
* create.php
* due.php
* index.php

# Event Manager Demo

![events](https://yii.wftutorials.com/uploads/2020/06/07l199.png)

In this demo we create an event manager application. This demo as the following features.
* Create and edit events
* Register attendees to events
* Delete attendees from events
* Search for events
* Close Events
* View closed events
* View all attendees
* View attendees for events

## Files
The files used for this demo are
* Controllers - Components/Controller.php, EventsController.php
* Models - Events.php, EventAttendees.php
* Views - The events folder
* Layouts - The events.php layout in the layouts directory

# File Manager Demo

![files](https://yii.wftutorials.com/uploads/2020/06/362poo.png)

In this demo we create a file manager application. This demo allows use to do the following
* Upload files
* Upload multiple Files
* Organise files by folders
* View uploaded files
* Search for files
* Trash files
* Delete files permanently
* Move files to diffrent folders

## File
The files used for this demo re
* Controllers - `FilesController.php`
* Models - [Files.php](https://github.com/wftutorials/yiidemos/blob/master/protected/models/Files.php), 
[FileUploader](https://github.com/wftutorials/yiidemos/blob/master/protected/models/FileUploader.php)
* View - the files folder


# Mini blog demo

![blog](https://yii.wftutorials.com/uploads/2020/06/5ene2w.png)

In this demo we create a mini blog application. This demo as alot of features like
* Create posts
* Upload featured images
* Share blog posts via unique url
* Comment on posts
* Tag posts
* Edit posts
* Publish and unpublish posts
* Like posts