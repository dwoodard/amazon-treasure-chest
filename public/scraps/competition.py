######
######
import requests
import time
import re

headers = {
	'User-Agent': 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2227.0 Safari/537.36'
}

from bs4 import BeautifulSoup
from splinter import Browser

#Get products
r = requests.get('http://atc.dustinwoodard.net/product/json',headers=headers)
products = r.json()
print products[0]['asin']

for p in products:
	if p['new_sellers_link'] == 'null':
		continue
	print p['new_sellers_link']
	# time.sleep(1)
	r = requests.get(p['new_sellers_link'],headers=headers)
	data = BeautifulSoup(r.text)
	sellers = data.find_all(class_="olpOffer")
	print len(sellers)

	for seller in sellers:
		sellerId = seller.find(class_="olpSellerName").a['href']
		m = re.search('((?:seller=)|(?:shops/))([A-Z0-9]{14})',sellerId)
		if m:
			sellerId = m.group(1)
			print sellerId
		print '\n'

		#link = seller.form['action']
		#print link
		#print '\n'


		# inputs = seller.form.input
		# print inputs
		# print '\n'

	# for seller in sellers:
	# 	print(len(seller))


# action = 'www.amazon.com'+seller.form['action']
#seller.find_all("input")[4]
# re.compile('.*name="(.*)".*').match(seller.find_all("input")[4]).groups()

# args = {
# "session-id":"",
# "qid":"",
# "sr":"",
# "signInToHUC":"",
# "metric-asin.B00IA3D9GQ":"",
# "registryItemID.1":"",
# "registryID.1":"",
# "itemCount":"",
# "offeringID.1":"",
# "isAddon":"",
# "submit.addToCart":""
# }

# seller.find_all(name=re.compile("session-id"))
#print seller.form.input['name'] +" "+seller.form.input['value']

#### jQuery('.olpOffer')
#jQuery(jQuery('.olpOffer').find('form')[0]).find('[name]')

#For each form ---- jQuery('.olpOffer').find('form')
#get (name: value) data out of each form.

#post item via form
# jQuery('[itemid]').attr('itemid')