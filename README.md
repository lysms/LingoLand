<p align="center">
  <img src="https://github.com/lysms/LingoLand/blob/master/resources/images/LLL.png" width="50%" height="30%" title="LingoLand Logo">
</p>

# LingoLand
Welcome to LingoLand!

## Summary of LingoLand
- LingoLand serves anyone who is trying to learn another language at any level. Whether it be a beginner level or intermediate level, it would help users by using both the Target Language that the user wants to learn and the Native Language that the user is already familiar with.
- LingoLand will allow you to generate flashcards on the fly, while still giving the user
context to the sentences in which it was found. If the user does not have a piece of text in mind,
they can use our suggested articles feature to find articles in which they are interested in
reading. When a user finds a sentence they do not understand, the user can copy that
sentence into our site’s flashcard making system, where the site will automatically prompt the
user to highlight the words inside the sentence in which the user does not know to help break
down the context. From there, users will have the option to create a flashcard to help them
better retain the information.
- The user’s flashcards will test them via a spaced repetition system (SRS) algorithm--a
technique for efficient memorization which uses repeated review of content following an
optimized schedule to improve long-term retention--developed by our team to help them better
remember certain phrases and words in the future. Users will be required to create their own
account to use the service, and will have their own personal dashboard where they can go
through all the flashcards that the algorithm has determined the user is about to forget. The
algorithm keeps track of which cards are due when, as well as automatically adjusts due dates
based on how well the user performs on a given card.

## Main Structure
1. For this application HTML, CSS and Javascript are the core technologies to build the
web pages. In this application, we will apply HTML and CSS for the styling and basic layout
structure for LingoLand web pages. JavaScript will be used to connect the site to the backend.
2. Since LingoLand is a flashcard making site, every user must need to sign up for an
account in order to access the learning material. In this case, we will use MySQL to save and
update the user's profile, progress, login information, etc. And all other data on the site.
We will use PHP coupled with AJAX to pull the data from MySQL. To translate terms, we want
to potentially use [Google Translate API](https://cloud.google.com/translate/docs/reference/rest), or some other language parsing API to help automate
the translation process. In suggesting articles, we could make use of the [Gdelt article searching](https://blog.gdeltproject.org/announcing-the-gdelt-full-text-search-api/)
API, which allows users to search for articles based on language and topic category.


## Using Flashcard Maker:
1. create a secret.php file inside `articleParser`
2. copy and paste the bottom code, be sure to replace `<apikey>` with the actual api key.
``` php
<?php
    $password = "<apikey>";
?>
```
3. Start xammp and go to the articleParser.php page (linked in the navigation bar as flashcard maker)
