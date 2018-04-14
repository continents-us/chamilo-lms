zip file that you have to uncompress at the root of your platform.

   Once you do this, you have to follow the steps below:
    1.  Go to Administration -> Platform Settings -> Stylesheets
    2.  Pick "Continents" and then "Save settings".
    3.  Go to Administration -> Platform Settings -> Find the setting called "Use custom pages" and select "Yes", then save.




Force HTTPS
    1. in app/config/configuration.php => change the value of $_configuration['root_web'] so it starts with https:// (line 46 in my configuration file)

    2. in /.htaccess I add the following lines (pasted the part from "RewriteEngine on" for clarity):

     Code: Select all
      RewriteEngine on

      #Force non-www:
      RewriteCond %{HTTP_HOST} ^www\.mydomain\.edu [NC]
      RewriteRule ^(.*)$ http://mydomain.edu/$1 [L,R=301]

      RewriteCond %{QUERY_STRING} ^id=(.*)$

      # Force HTTPS
      RewriteCond %{HTTPS} !^on$
      RewriteRule (.*) https://mydomain.edu/$1 [R,L]

