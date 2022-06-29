C:\source\web\yourcellarbook.com
    \web


# Dir
cd C:\source\web\yourcellarbook.com

# run
.\r

# Installation
* PHP 8.1(https://www.php.net/manual/en/install.php)


###
# Markdown viwer
https://github.com/showdownjs/showdown
https://github.com/markedjs/marked
https://jamesbachini.com/markdown-tutorial/
https://github.com/Cristy94/markdown-blog

# Alpine.js
https://alpinejs.dev/start-here
https://www.freecodecamp.org/news/learn-alpine-js-in-this-free-tutorial-course/
https://codewithhugo.com/alpinejs-x-data-fetching/
https://www.alpinetoolbox.com/examples/

# PHP
https://flightphp.com/
https://github.com/mikecao/flight

# Dest:>
yourcellarbook.com
yourcellarbook.com.cryptoinvestandtrade.eu

ns8181.hostgator.com
ns8182.hostgator.com

# Google AdSense
https://support.google.com/adsense/answer/9190028?hl=en
https://blog.travelpayouts.com/en/add-adsense-code-to-your-blog/
https://stackoverflow.com/questions/38349878/inserting-google-advertisements-with-html

# sqlite3 / DB
cd C:\Source\web\yourcellarbook.com\web
sqlite3 data\wine_db.db
.tables
.exit

DB Restore/Create
sqlite3 data/wine_db.db < db_wine-001.sql

DB BUP:
sqlite3 data/wine_db.db .dump > db_wine-bup.sql

# Run this in GIT-bash
curl -v -X POST http://localhost:8888/api/stocks/  \
   -H 'Content-Type: application/json'          \
   -d '{"ticker": "AAPL", "close": 108.69599609375001}'
