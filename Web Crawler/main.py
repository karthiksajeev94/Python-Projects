import requests,bs4,os
c=0
funcCount=0
f=0
levCount=1
urlHolder=[]
urlCount=0
temp=0
grandChild=[]

# Function to check the presence of special characters in the URL
def rogueSymbol(str):
    set='\/:*?"<>|'
    return 1 in [k in str for k in set]

# Function to keep track of the URLs added thus far and accordingly decide if current URL should be downloaded or not
def insertNewURL(newURL):
    global urlHolder
    if not newURL in urlHolder:
        urlHolder.append(newURL)
        return 1
    else:
        return 0

def webCrawl(url,levels):
    global c,f,funcCount,levCount,urlHolder,urlCount,temp,grandChild

    while funcCount<1:
        funcCount = funcCount + 1
        # Open URL
        try:
            res = requests.get(url)
            res.raise_for_status()
        except Exception:
            continue
        # Pass URL to parser
        soup = bs4.BeautifulSoup(res.text, "lxml")
        # Extract 'a' elements
        s1 = soup.select('a')
        for i in range(len(s1)):
            if levels>2 and levCount==2:
                grandChild.append(s1[i].get('href'))
            # Print ith link in the URL
            print(s1[i].get('href'))
            # Open ith link
            try:
                res1 = requests.get(s1[i].get('href'))
                res1.raise_for_status()
            except Exception:
                continue
            # Check if link contains a PDF, and image or a CSS file
            ext = s1[i].get('href')[-4:]
            if ext == ".pdf" or ext == ".png" or ext == ".jpg" or ext == ".css":
                # Check for the presence of special characters and name accordingly
                if rogueSymbol(s1[i].getText())==1:
                    c = c + 1
                    fileName = "File " + str(c) + ext
                else:
                    fileName = s1[i].getText() + ext
            else:
                # Pass ith link to parser and extract its title
                nameExtract = bs4.BeautifulSoup(res1.text, "lxml")
                s2 = nameExtract.select('head title')
                # If title exists, check for the presence of special characters and name accordingly
                if len(s2) > 0:
                    if rogueSymbol(s2[0].getText()) == 1:
                        c = c + 1
                        fileName = "File " + str(c) + ".html"
                    else:
                        fileName = s2[0].getText() + ".html"
                # If title doesn't exist, give a serial-wise name
                else:
                    c = c + 1
                    fileName = "File " + str(c) + ".html"

            # If current URL doesn't already exist in URLHolder, add it to the current directory for level 1 or to the
            # appropiate directory for subsequent levels
            if insertNewURL(s1[i].get('href'))==1:
                try:
                    playFile = open(fileName, 'wb')
                except Exception:
                    continue

                # Number of files that will be downloaded after accounting for repetition
                urlCount = urlCount + 1
                # Write contents to file
                for i in res1.iter_content(100000):
                    playFile.write(i)
                playFile.close()
    # Enter only if no. of levels to scrape > 1
    if levels!=1:
        if f == 0:
            f = 1
            # Keep track of the level being scraped
            levCount=levCount+1
            for j in range(len(s1)):
                funcCount = 0
                # Recursive call
                webCrawl(s1[j].get('href'),levels)
            if levels>2:
                funcCount=0
                levCount=levCount+1
                for k in range(len(grandChild)):
                    webCrawl(grandChild[k],levels)

webCrawl('http://www.purdue.edu/',3)
