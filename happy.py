import json
import sys

d = open('auswertung.json', 'rt').read()
j = json.loads(d)

machines_sbg = []
machines_wien = []

for d in j:
    if isinstance(d['salzburg'], list):
#        print '!! sbg'
        print '"%s" %d %d %d %d' % (d['date'], -1, -1, -1, -1)
    else:
        for m in d['salzburg'].keys():
            if m not in machines_sbg: machines_sbg += [m]

        bzt = 0 if d['salzburg']['BZT PFK 1607 PX'] == 'Frei' else 1
        dim = 0 if d['salzburg']['Dimension SST 1200'] == 'Frei' else 1
        exp = 0 if d['salzburg']['GCC Expert 24'] == 'Frei' else 1
        spirit = 0 if d['salzburg']['GCC Spirit GLS (60 Watt)'] == 'Frei' else 1
        print '"%s" %d %d %d %d' % (d['date'], bzt, dim, exp, spirit)

    if isinstance(d['wien'], list):
#        print '!! wien'
        pass
    else:
        for m in d['wien'].keys():
            if m not in machines_wien: machines_wien += [m]

print >>sys.stderr, machines_sbg
#print machines_wien
