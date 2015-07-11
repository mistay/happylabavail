set term pdf color
set output "happy.pdf"

set ylabel "Availability (fault / idle / in use)"

set noytics

set yrange [0:13]

set key above

f(x) = x * 0.8

set xdata time
set timefmt '"%Y-%m-%d %H:%M:%S"'

plot \
    "happy.txt" using 1:($2+11) with p pt 7 ps 0.3 title "BZT PFK 1607 PX", \
    "happy.txt" using 1:($3+8) with p pt 7 ps 0.3 title "Dimension SST 1200", \
    "happy.txt" using 1:($4+5) with p pt 7 ps 0.3 title "GCC Expert 24", \
    "happy.txt" using 1:($5+2) with p pt 7 ps 0.3 title "GCC Spirit GLS (60 Watt)"
    
    
