# laravel-blog-concept
Simple responsive blog concept with features such as:
* authentication 
  * registering
  * logging in
* posts with images
* sorting by category and / or search query
* commenting
* pagination
* factories for easy debugging, with faked lorem ipsum text

Styling is done with TailwindCSS and inline javascript is provided by AlpineJS. Since backend was the focus I had no need for extensive custom CSS pages for every component, and went with the Laravel standard of Tailwind to define all the styling in the HTML pages themselves.
The database is in mysql

The goal of this project was the learn to work with Laravel. In doing so I always kept documentation at hand, while always striving to refactor my code to the perscriped standards. Lots of code is commented out for reference. Commented code has the same functionality but is replaced by adjacent, more modern solutions.
Most components of the website are aimed to be as modular as possible to avoid duplicated HTML-items. Models are set up to avoid n+1 SQL queries.

## Todo
To expand this concept I would like to add pages such as a;
* Dashboard page where users can manage their posts and edit / delete them
* Newsletter subscription api integration (currently the subscription box is a blank field)
* Commenting to another comment specifically (indented)

![laravel1](https://user-images.githubusercontent.com/22600400/138628330-6aef7207-52c5-4c8a-af5a-dfd891d2ea5e.png)

![laravel2](https://user-images.githubusercontent.com/22600400/138628329-7d47dff1-82fa-42ec-bdb3-aaa456efb09e.png)

![laravel3](https://user-images.githubusercontent.com/22600400/138628326-7b9c24e4-4a1e-4bac-a8df-83487b244996.png)
