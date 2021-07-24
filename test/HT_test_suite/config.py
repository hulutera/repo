## ==========README============== ##

## ==========This is a readme file for Huluter.com test-automation======== ##
# In order to run the automation code, one needs to follow the following instruction
# 1) Install python3 (https://www.python.org/downloads/) . Make sure to put the python path in the environment variable.
# 2) Download selenium webdriver preferebly chromedriver (https://chromedriver.chromium.org/downloads). It's possible to install other browser drivers as well like firefox driver.
# 3) Place the webdriver in python dir
# 4) The test opens a browser automatically and do an auto test. When the test execution is done, a summary of the execution will be shown.
# 5) Copy the path to upload image
# 6) Some TCs might need a re-run
# 
# ======Mandatory======
main_URL = "https://hulutera.com/index.php"   ## To test HT online
# main_URL = "http://localhost/index.php"     ## To test HT in local
driver_path = 'C:\Python34\chromedriver.exe'  ## copy the webdriver path here
test_user_name = "testuser"
user_first_name = "tester"
user_last_name = "tester2"
test_user_email = "testuser@testuser.com"
test_user_email_existing = "testuser@hulutera.com"
test_user_phone = "0123456789"
test_user_password = "We12345"
test_user_new_password = "pass12345"
######====image path for upload item========#####
car_img = ""     ## "C:/Users/Anjelo/Downloads/a_upload_image/ford.jpg" 
comp_img = ""    ## "C:/Users/Anjelo/Downloads/a_upload_image/339365425_23590547-af46-4dd5-b8de-290f607fdf7b.jpg"
elec_img = ""    ## "C:/Users/Anjelo/Downloads/a_upload_image/20200628_150120.jpg"
house_img = ""   ## "C:/Users/Anjelo/Downloads/a_upload_image/image-0-02-01-8503f844bbb3e006e2062f7f5169d5dea3fad42081653f6ceadf7d740aa01b4c-V.jpg"
hh_img = ""      ## "C:/Users/Anjelo/Downloads/a_upload_image/image000000001.jpg"
phone_img = ""   ## "C:/Users/Anjelo/Downloads/a_upload_image/iPhone-5-diagnose-rep-p.jpg"
other_img = ""   ## "C:/Users/Anjelo/Downloads/a_upload_image/20180224_105136 (1).jpg"