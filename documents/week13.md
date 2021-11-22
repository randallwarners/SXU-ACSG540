# Week 13 Assignment

Name: Randall Warners

## 10.1

*What is the goal of the use of Ajax in a Web application?*

AJAX allows a client to update parts of a webpage
without updating the entire page.

## 10.2

*What does it mean for a request to be asynchronous?*

An asynchronous request doesn't wait for a response before continuing.
Instead, an event is triggered when the server issues a response
so that the rest of the page can function normally in the meantime.

## 10.8

*What is the purpose of the onreadystatechange property of an XHR object?*

The value of the onreadystatechange property is a callback function
that is called when the readyState property changes.
Often, it checks for a readyState of DONE,
which indicates the request is complete,
before taking an action.

## 10.9

*Under what circumstances would one use the POST method for an Ajax request?*

The book says on page 409,
"Recall that GET is used when there is a relatively small amount of data to be retrieved
and the data is not valuable to an intruder.
POST is used when there are many widgets on the form, making the form data lengthy,
or when it is important that the retrieved data be secure."
This doesn't seem right to me.
POST is used to create or modify data
and GET is used to retrieve data.
POST should not be used to retrieve data.
