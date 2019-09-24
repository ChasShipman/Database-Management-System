## UA Movie Database

### CS 301 Group 2

* Henry Bugajski - hjbugajski@crimson.ua.edu (Section 002)
* Logan Mimms - lgmimms@crimson.ua.edu (Section 002)
* Chas Shipman - ceshipman@crimson.ua.edu (Section 002)
* Minrui Huang - mhuang11@crimson.ua.edu (Section 002)

## How to Set Up Phase III

### Lightweight

1. Open `uamovie.db` (NOT `uamovie.sql`!) in DB Browser for SQLite.
2. Database is fully populated.
3. Queries for each task are under the `QUERIES` comment in `lightweight.txt` in the `sql` folder.

### Heavyweight

1. Download and install XAMPP (or similar program) (NOTE: only need Apache and MySQL, do not need FileZilla, Tomcat, or Mercury).
2. Once downloaded, launch XAMPP and start the Apache and MySQL servers.
3. Clone this repository into your htdocs folder (`C:\{path to xampp installation}\xampp\htdocs\`).
4. In your browser, navigate to `localhost/dashboard/` and then select `phpMyAdmin` in the top right corner.
5. Once in phpMyAdmin, create a new database named `uamovie`.
6. Select `uamovie` database from left side panel.
7. Select the `Import` tab in the top bar of the database.
8. Upload the `uamovie.sql` (NOT `uamovie.db`!) file from the `sql` folder.
9. In your browser, navigate to `localhost/ua-movie/login.php`.
10. If done correctly, you should see a login page and are ready to begin use and development of UA Movie Database.

We used phpMyAdmin, PHP, and HTML to complete the heavyweight option.

**Phases I & II are located in the `docs/` folder.**
