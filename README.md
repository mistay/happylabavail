# happylabavail

First, fetch data via cronjob:

crontab -e
insert: * * * * *               /path/to/happylab.sh

happylab.sh will download files like ausstattung2015-07-11-15-03-01.html

Next, analyze with:
php auswertung.php

This assumes, that the html files are in the same directory. As result, you'll get auswertung.json.

To plot graphics feel you have to prepare the data.

python happy.py > happy.txt

Next, plot with gnuplot and you'll get the PNG graphics


Special thanks to <a href="mailto:pmeerw@pmeerw.net">Peter Meerwald</a> and Per Östgard
