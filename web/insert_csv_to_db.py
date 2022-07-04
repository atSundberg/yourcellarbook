import sqlite3

def import_csv ():
   conn = sqlite3.connect('data/wine_db.db')
   wines = open('data/wine_list.txt')

   cursor = conn.cursor()
   for row in wines:
      comps = row.split(';')
      print(comps[0])

def main():
   import_csv()

if __name__ == "__main__":
   main()
