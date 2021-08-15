### ============= Huluter.com test-automation code ================ ###
import logging
import unittest
import time
import config
from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.support.ui import Select
from selenium.common.exceptions import NoSuchElementException, TimeoutException
from selenium.common.exceptions import NoAlertPresentException
from selenium.webdriver.support.wait import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC
from selenium.webdriver.common import keys
from selenium.webdriver.chrome.options import Options
from webdriver_manager.chrome import ChromeDriverManager
import HtmlTestRunner

class Basic(unittest.TestCase):


    def setUp(self):
	
	    # Headless
        opt = Options()
        opt.add_argument("--headless")
        self.HTTP_URL = config.main_URL
        self.driver = webdriver.Chrome(ChromeDriverManager().install(),chrome_options=opt)
        self.driver.get(self.HTTP_URL)

        # Headed		
        # driver = webdriver.Chrome(executable_path="chromedriver.exe",chrome_options=opt)
        #self.accept_next_alert = True
        #self.driver = webdriver.Chrome(executable_path=config.driver_path)
        # self.driver.maximize_window()
        # self.top_window_handle = self.driver.current_window_handle


    def test_top_header(self):
        print ("TC1: Top Header starts")
        self.top_header()
        print ("TC1: Ends")


    def test_search(self):
        print ("TC2: Search box")
        self.search()
        print ("TC2: End")


    def test_mainTab(self):
        print ("TC3: Maintab")
        self.maintab()
        print ("TC3: End")


    def test_index_page(self):
        print ("TC4: Index page")
        self.index()
        print ("TC4: End")


    def test_item_view(self):
        print ("TC5: item_view")
        self.item_view()
        print ("TC5: End")


    def test_footer(self):
        print ("TC6: Footer")
        self.footer()
        print ("TC6: End")


    def test_register(self):
        print ("TC7: Register")
        self.register()
        print ("TC7: End")


    def test_login(self):
        print ("TC8: Login")
        self.login()
        print ("TC8: End")


    def test_contactUs(self):
        print ("TC9: Contact Us")
        self.contactUs()
        print ("TC9: End")


    def test_upload(self):
        print ("TC10: Upload")
        self.upload()
        print ("TC10: End")


    def test_edit_profile(self):
        print ("TC11: Edit Profile")
        self.edit_profile()
        print ("TC11: End")


    def test_your_item(self):
        print ("TC12: your item")
        self.your_item()
        print ("TC12: End")


    def test_pass_recovery(self):
        print ("TC13: Password Recovery")
        self.pass_recovery()
        print ("TC13: End")		

		
    def top_header(self):
        # Reset the page
        self.clickButton(By.CLASS_NAME, "logo_img")
		
	    ##### Assert the Language tabs
		# Check all languages
        print("####language verification starts")
        lang_list = ("am", "ao", "tg", "so", "en")
        for list in lang_list:
            self.clickButton(By.ID, list)
            self.URL = self.driver.current_url
            self.assertIn("lan=" + list, self.URL)

        #### Assert the top-right links
        # Check register link
        print("####topheader links verification starts")
        self.clickButton(By.LINK_TEXT, "Register")
        self.URL = self.driver.current_url
        self.assertIn("register.php", self.URL)
		
        # Check login link
        self.clickButton(By.LINK_TEXT, "Login")
        self.URL = self.driver.current_url
        self.assertIn("login.php", self.URL)
        
		# Check PostItem link
        self.clickButton(By.LINK_TEXT, "Post Items")
        self.URL = self.driver.current_url
        self.assertIn("prompt.php?type=9", self.URL)

		
    def search(self):
        # Reset the page
        self.clickButton(By.CLASS_NAME, "logo_img")
		
        # search without an input
        print ("####search without an input")
        self.clickButton(By.CLASS_NAME, "search-btn")
        self.text_compare(how=By.ID, what="search_failed", expected_txt="Please enter the search word or any other search options")
        		
		# search with only keyword
        print ("####search with only keyword")
        self.clearTextBox(By.NAME, "search_text")
        self.enterValue(By.NAME, "search_text", "car")
        self.clickButton(By.CLASS_NAME, "search-btn")
        self.text_compare(how=By.ID, what="divCommon", expected_txt="Price Details")

        # search with keyword and all item
        print ("####search with keyword and all item")
        self.clearTextBox(By.NAME, "search_text")
        self.enterValue(By.NAME, "search_text", "car")
        Select(self.driver.find_element_by_css_selector("select[name=\"item\"]")).select_by_value("All")
        self.clickButton(By.CLASS_NAME, "search-btn")
        self.text_compare(how=By.ID, what="divCommon", expected_txt="Price Details")

        # search with keyword and all cities
        print ("####search with keyword and all cities")
        self.clearTextBox(By.NAME, "search_text")
        self.enterValue(By.NAME, "search_text", "car")
        Select(self.driver.find_element_by_css_selector("select[name=\"cities\"]")).select_by_value("All")
        self.clickButton(By.CLASS_NAME, "search-btn")
        self.text_compare(how=By.ID, what="divCommon", expected_txt="Price Details")

        # search all item and all cities
        print ("####search all item and all cities")
        self.clearTextBox(By.NAME, "search_text")
        Select(self.driver.find_element_by_css_selector("select[name=\"item\"]")).select_by_value("All")
        Select(self.driver.find_element_by_css_selector("select[name=\"cities\"]")).select_by_value("All")
        self.clickButton(By.CLASS_NAME, "search-btn")
        self.text_compare(how=By.ID, what="divCommon", expected_txt="Price Details")
        
		# search items
        print ("####search items")
        item_list = ("car", "computer", "house", "electronic", "household", "phone", "other")
        for item in item_list:
		    # search car computer house electronic household phone other
            self.clearTextBox(By.NAME, "search_text")
            Select(self.driver.find_element_by_css_selector("select[name=\"item\"]")).select_by_value(item)
            self.clickButton(By.CLASS_NAME, "search-btn")
            self.text_compare(how=By.ID, what="divCommon", expected_txt="Price Details")
            time.sleep(1)

		
    def maintab(self):
        # Reset the page
        self.clickButton(By.CLASS_NAME, "logo_img")

        # verify maintab
        print ("####Verify maintab")
        tab_list = ("latest-img", "sidelist-car", "sidelist-computer", "sidelist-house", "sidelist-phone", "sidelist-electronic", "sidelist-household", "sidelist-other")
        for tab in tab_list:
            self.clickButton(By.CLASS_NAME, tab)
            self.text_compare(how=By.ID, what="divCommon", expected_txt="Price Details")
            time.sleep(2)


    def index(self):
        # Reset the page
        self.clickButton(By.CLASS_NAME, "logo_img")
				
        # right nav		
        time.sleep(5)
        print ("####Verify index page")
        self.clickButton(By.PARTIAL_LINK_TEXT , "Mekelle")
        self.text_compare(how=By.ID, what="divCommon", expected_txt="Price Details")        

		
    def item_view(self):
        # Reset the page
        self.clickButton(By.CLASS_NAME, "logo_img")
		
		### Car item tab		
		# Show Item Detail by clicking title link
        print ("####Verify car item view")
        self.clickButton(By.CLASS_NAME, "sidelist-car")
        msg_get = self.driver.find_element(by=By.XPATH, value="//div[@class='caption']/a[1]")
        self.driver.execute_script("arguments[0].scrollIntoView()", msg_get)
        self.clickButton(By.XPATH, "//div[@class='caption']/a[1]")
        self.text_compare(how=By.CLASS_NAME, what="featured_detailed_left", expected_txt="Specification")
		# Show Item Detail by clicking the thumbnail image
        self.clickButton(By.CLASS_NAME, "logo_img")
        self.clickButton(By.CLASS_NAME, "sidelist-house")
        msg_get = self.driver.find_element(by=By.XPATH, value="/html/body/div[2]/div/div/div/div/div[1]/div[1]/div/div/div[1]/a/img")
        self.driver.execute_script("arguments[0].scrollIntoView()", msg_get)
        self.clickButton(By.XPATH, "/html/body/div[2]/div/div/div/div/div[1]/div[1]/div/div/div[1]/a/img")
        self.text_compare(how=By.CLASS_NAME, what="featured_detailed_left", expected_txt="Specification")
				
        # Report abuse
        print ("####Verify report abuse")
        self.clickButton(By.XPATH, "/html/body/div[2]/div/div/div/div/div[1]/div/div[1]/div[4]/div[3]/a")
        Select(self.driver.find_element_by_css_selector("select[name=\"select_abuse\"]")).select_by_value("Other")        
        self.clickButton(By.XPATH, "/html/body/div[2]/div/div/div/div/div[1]/div/div[1]/div[6]/div[2]/input[1]")
        self.text_compare(how=By.CLASS_NAME, what="featured_detailed_left", expected_txt="You successfully reported the item!")


    def footer(self):
        # Reset the page
        self.clickButton(By.CLASS_NAME, "logo_img")

        ## Footer
		# Terms and Conditions/ Privacy Policy/ ContactUs
        print ("####Verify the footer links")
        footer_dict={"type=terms": "/html/body/footer/div[1]/div/div/div[2]/p[2]/a", "type=privacy": "/html/body/footer/div[1]/div/div/div[2]/p[3]/a", "contact-us": "/html/body/footer/div[1]/div/div/div[2]/p[4]/a"}
        for key in footer_dict:
            self.clickButton(By.XPATH, footer_dict[key])
            self.URL = self.driver.current_url
            self.assertIn(key, self.URL)
		

    def register(self):
        # Reset the page
        self.clickButton(By.CLASS_NAME, "logo_img")

        # Register success
        print ("####Verify registration")
        self.clickButton(By.CLASS_NAME, "register-link-txt")
        time.sleep(2)
        self.clearTextBox(By.ID, "fieldFirstName")
        self.enterValue(By.ID, "fieldFirstName", config.user_first_name)
        self.clearTextBox(By.ID, "fieldLastName")
        self.enterValue(By.ID, "fieldLastName", config.user_last_name)
        self.clearTextBox(By.ID, "fieldEmail")
        self.enterValue(By.ID, "fieldEmail", config.test_user_email)
        self.clearTextBox(By.ID, "fieldPhoneNr")
        self.enterValue(By.ID, "fieldPhoneNr", config.test_user_phone)
        self.clearTextBox(By.ID, "fieldPassword")
        self.enterValue(By.ID, "fieldPassword", config.test_user_password)
        self.clearTextBox(By.ID, "fieldPasswordRepeat")
        self.enterValue(By.ID, "fieldPasswordRepeat", config.test_user_password)
        Select(self.driver.find_element_by_css_selector("select[name=\"fieldContactMethod\"]")).select_by_value("phone")
        Select(self.driver.find_element_by_css_selector("select[name=\"fieldTermAndCondition\"]")).select_by_value("Yes")
        self.clickButton(By.XPATH, "/html/body/div[2]/form/div/div/div[6]/div/div/div/div/button")
        self.text_compare(how=By.ID, what="inner", expected_txt="Thank you for registering.")


    def login(self):
        # Reset the page
        self.clickButton(By.CLASS_NAME, "logo_img")
        # Login success
        print ("####Verify Login")
        self.login_form()
        self.URL = self.driver.current_url
        self.assertIn("mypage", self.URL)
		
		# Logout
        self.clickButton(By.CLASS_NAME, "glyphicon-log-out")
        self.URL = self.driver.current_url
        self.assertIn("index", self.URL)


    def login_form(self):
        # Login form
        self.clickButton(By.CLASS_NAME, "glyphicon-log-in")
        self.clearTextBox(By.ID, "fieldEmail")
        self.enterValue(By.ID, "fieldEmail", config.test_user_email_existing)
        self.clearTextBox(By.ID, "fieldPassword")
        self.enterValue(By.ID, "fieldPassword", config.test_user_password) 
        self.clickButton(By.CLASS_NAME, "login-btn")       		
		
		
    def contactUs(self):
        # Reset the page
        self.clickButton(By.CLASS_NAME, "logo_img")

        # Contact Us success
        print ("####Verify contactUs")
        self.clickButton(By.XPATH, "/html/body/footer/div[1]/div/div/div[2]/p[4]/a")
        self.clearTextBox(By.ID, "fieldName")
        self.enterValue(By.ID, "fieldName", config.user_first_name)
        self.clearTextBox(By.ID, "fieldEmail")
        self.enterValue(By.ID, "fieldEmail", config.test_user_email)
        self.clearTextBox(By.ID, "fieldCompany")
        self.enterValue(By.ID, "fieldCompany", "Hulutera")
        self.clearTextBox(By.ID, "fieldSubject")
        self.enterValue(By.ID, "fieldSubject", "Contact Us test")
        Select(self.driver.find_element_by_css_selector("select[name=\"fieldPurpose\"]")).select_by_value("Problems with picture")
        self.clearTextBox(By.ID, "fieldMessage")
        self.enterValue(By.ID, "fieldMessage", "I would like to contact you for the test purpose.")
        self.clickButton(By.CLASS_NAME, "btn-lg")
        self.text_compare(how=By.ID, what="inner", expected_txt="We appreciate your taking the time to contact us")


    def upload(self):
        # Reset the page
        self.clickButton(By.CLASS_NAME, "logo_img")

        ### UPLOAD
		# Login
        self.login_form()

		# Car
        print ("####Verify car upload####")
        self.clickButton(By.CLASS_NAME, "glyphicon-upload")
        time.sleep(2)
        self.clickButton(By.XPATH, "/html/body/div[2]/div/div/div/div/ul/li[1]/div/a/img")
        time.sleep(2)
        Select(self.driver.find_element_by_css_selector("select[name=\"fieldLocation\"]")).select_by_value("Adama")
        self.clearTextBox(By.ID, "fieldTitle")
        self.enterValue(By.ID, "fieldTitle", "test car")
        Select(self.driver.find_element_by_css_selector("select[name=\"idCategory\"]")).select_by_value("Bus")
        Select(self.driver.find_element_by_css_selector("select[name=\"fieldMake\"]")).select_by_value("apollo")
        self.clearTextBox(By.ID, "fieldModel")
        self.enterValue(By.ID, "fieldModel", "MOD123")
        Select(self.driver.find_element_by_css_selector("select[name=\"fieldModelYear\"]")).select_by_value("2021")
        Select(self.driver.find_element_by_css_selector("select[name=\"fieldGearType\"]")).select_by_value("Manual")
        Select(self.driver.find_element_by_css_selector("select[name=\"fieldFuelType\"]")).select_by_value("Bensine")
        Select(self.driver.find_element_by_css_selector("select[name=\"fieldMilage\"]")).select_by_value("0-49999")
        Select(self.driver.find_element_by_css_selector("select[name=\"fieldNoOfSeat\"]")).select_by_value("5")
        Select(self.driver.find_element_by_css_selector("select[name=\"fieldColor\"]")).select_by_value("black")
        Select(self.driver.find_element_by_css_selector("select[name=\"fieldPriceCurrency\"]")).select_by_value("ETB")
        Select(self.driver.find_element_by_css_selector("select[name=\"rentOrSell\"]")).select_by_value("fieldPriceSell") 
        self.clearTextBox(By.ID, "fieldPriceSell")
        self.enterValue(By.ID, "fieldPriceSell", "500 000")
        Select(self.driver.find_element_by_css_selector("select[name=\"fieldPriceNego\"]")).select_by_value("Yes")
        Select(self.driver.find_element_by_css_selector("select[name=\"fieldContactMethod\"]")).select_by_value("phone")
        msg_get = self.driver.find_element(by=By.CLASS_NAME, value="fileuploader-thumbnails-input-inner")
        self.driver.execute_script("arguments[0].scrollIntoView()", msg_get)
        self.driver.find_element_by_name("files[]").send_keys(config.car_img)
        self.clickButton(By.NAME, "submit")
        self.text_compare(how=By.ID, what="inner", expected_txt="Thank you for using our service!")

        # Computer
        print ("####Verify computer upload#####")
        self.clickButton(By.CLASS_NAME, "glyphicon-upload")
        time.sleep(2)
        self.clickButton(By.XPATH, "/html/body/div[2]/div/div/div/div/ul/li[2]/div/a/img")
        time.sleep(2)
        Select(self.driver.find_element_by_css_selector("select[name=\"fieldLocation\"]")).select_by_value("Addis Ababa")
        self.clearTextBox(By.ID, "fieldTitle")
        self.enterValue(By.ID, "fieldTitle", "test computer")
        Select(self.driver.find_element_by_css_selector("select[name=\"idCategory\"]")).select_by_value("Laptop")
        Select(self.driver.find_element_by_css_selector("select[name=\"fieldMake\"]")).select_by_value("acer")
        self.clearTextBox(By.ID, "fieldModel")
        self.enterValue(By.ID, "fieldModel", "MOD123")
        Select(self.driver.find_element_by_css_selector("select[name=\"fieldOs\"]")).select_by_value("Windows")
        Select(self.driver.find_element_by_css_selector("select[name=\"fieldProcessor\"]")).select_by_value("Over 3.0GHz")
        Select(self.driver.find_element_by_css_selector("select[name=\"fieldRam\"]")).select_by_value("Over 4.0GB")
        Select(self.driver.find_element_by_css_selector("select[name=\"fieldHardDrive\"]")).select_by_value("Under 100GB")
        Select(self.driver.find_element_by_css_selector("select[name=\"fieldColor\"]")).select_by_value("black")
        Select(self.driver.find_element_by_css_selector("select[name=\"fieldPriceCurrency\"]")).select_by_value("ETB")
        self.clearTextBox(By.ID, "fieldPriceSell")
        self.enterValue(By.ID, "fieldPriceSell", "5000")
        Select(self.driver.find_element_by_css_selector("select[name=\"fieldPriceNego\"]")).select_by_value("Yes")
        Select(self.driver.find_element_by_css_selector("select[name=\"fieldContactMethod\"]")).select_by_value("phone")
        msg_get = self.driver.find_element(by=By.CLASS_NAME, value="fileuploader-thumbnails-input-inner")
        self.driver.execute_script("arguments[0].scrollIntoView()", msg_get)
        self.driver.find_element_by_name("files[]").send_keys(config.comp_img)
        self.clickButton(By.NAME, "submit")
        self.text_compare(how=By.ID, what="inner", expected_txt="Thank you for using our service!")

        # Electronics
        print ("####Verify electronics upload####")
        self.clickButton(By.CLASS_NAME, "glyphicon-upload")
        time.sleep(2)
        self.clickButton(By.XPATH, "/html/body/div[2]/div/div/div/div/ul/li[3]/div/a/img")
        time.sleep(2)
        Select(self.driver.find_element_by_css_selector("select[name=\"fieldLocation\"]")).select_by_value("Bahir Dar")
        self.clearTextBox(By.ID, "fieldTitle")
        self.enterValue(By.ID, "fieldTitle", "test electronics")
        Select(self.driver.find_element_by_css_selector("select[name=\"idCategory\"]")).select_by_value("Camera")
        Select(self.driver.find_element_by_css_selector("select[name=\"fieldPriceCurrency\"]")).select_by_value("ETB")
        self.clearTextBox(By.ID, "fieldPriceSell")
        self.enterValue(By.ID, "fieldPriceSell", "5000")
        Select(self.driver.find_element_by_css_selector("select[name=\"fieldPriceNego\"]")).select_by_value("Yes")
        Select(self.driver.find_element_by_css_selector("select[name=\"fieldContactMethod\"]")).select_by_value("phone")
        msg_get = self.driver.find_element(by=By.CLASS_NAME, value="fileuploader-thumbnails-input-inner")
        self.driver.execute_script("arguments[0].scrollIntoView()", msg_get)
        self.driver.find_element_by_name("files[]").send_keys(config.elec_img)
        self.clickButton(By.NAME, "submit")
        self.text_compare(how=By.ID, what="inner", expected_txt="Thank you for using our service!")

        # House
        print ("####Verify house upload####")
        self.clickButton(By.CLASS_NAME, "glyphicon-upload")
        time.sleep(2)
        self.clickButton(By.XPATH, "/html/body/div[2]/div/div/div/div/ul/li[4]/div/a/img")
        time.sleep(2)
        Select(self.driver.find_element_by_css_selector("select[name=\"fieldLocation\"]")).select_by_value("Mekelle")
        self.clearTextBox(By.ID, "fieldTitle")
        self.enterValue(By.ID, "fieldTitle", "test house")
        Select(self.driver.find_element_by_css_selector("select[name=\"idCategory\"]")).select_by_value("Commercial")
        Select(self.driver.find_element_by_css_selector("select[name=\"fieldKebele\"]")).select_by_value("1")
        Select(self.driver.find_element_by_css_selector("select[name=\"fieldWereda\"]")).select_by_value("1")
        Select(self.driver.find_element_by_css_selector("select[name=\"fieldWater\"]")).select_by_value("Yes")
        Select(self.driver.find_element_by_css_selector("select[name=\"fieldElectricity\"]")).select_by_value("Yes")
        self.clearTextBox(By.ID, "fieldLotSize")
        self.enterValue(By.ID, "fieldLotSize", "150")
        Select(self.driver.find_element_by_css_selector("select[name=\"fieldBuildYear\"]")).select_by_value("2021")
        Select(self.driver.find_element_by_css_selector("select[name=\"fieldBathroom\"]")).select_by_value("2")
        Select(self.driver.find_element_by_css_selector("select[name=\"fieldToilet\"]")).select_by_value("2")
        Select(self.driver.find_element_by_css_selector("select[name=\"fieldNrBedroom\"]")).select_by_value("3")
        Select(self.driver.find_element_by_css_selector("select[name=\"fieldPriceCurrency\"]")).select_by_value("ETB")
        Select(self.driver.find_element_by_css_selector("select[name=\"rentOrSell\"]")).select_by_value("fieldPriceRent")
        self.clearTextBox(By.ID, "fieldPriceRent")
        self.enterValue(By.ID, "fieldPriceRent", "10000")
        Select(self.driver.find_element_by_css_selector("select[name=\"fieldPriceRate\"]")).select_by_value("monthly")        
        Select(self.driver.find_element_by_css_selector("select[name=\"fieldPriceNego\"]")).select_by_value("Yes")
        Select(self.driver.find_element_by_css_selector("select[name=\"fieldContactMethod\"]")).select_by_value("phone")
        msg_get = self.driver.find_element(by=By.CLASS_NAME, value="fileuploader-thumbnails-input-inner")
        self.driver.execute_script("arguments[0].scrollIntoView()", msg_get)
        self.driver.find_element_by_name("files[]").send_keys(config.house_img)
        self.clickButton(By.NAME, "submit")
        self.text_compare(how=By.ID, what="inner", expected_txt="Thank you for using our service!")

        # Household
        print ("####Verify Household upload####")
        self.clickButton(By.CLASS_NAME, "glyphicon-upload")
        time.sleep(2)
        self.clickButton(By.XPATH, "/html/body/div[2]/div/div/div/div/ul/li[5]/div/a/img")
        time.sleep(2)
        Select(self.driver.find_element_by_css_selector("select[name=\"fieldLocation\"]")).select_by_value("Hawassa")
        self.clearTextBox(By.ID, "fieldTitle")
        self.enterValue(By.ID, "fieldTitle", "test household")
        Select(self.driver.find_element_by_css_selector("select[name=\"idCategory\"]")).select_by_value("Kitchen Appliances")
        Select(self.driver.find_element_by_css_selector("select[name=\"fieldPriceCurrency\"]")).select_by_value("ETB")
        self.clearTextBox(By.ID, "fieldPriceSell")
        self.enterValue(By.ID, "fieldPriceSell", "3000")
        Select(self.driver.find_element_by_css_selector("select[name=\"fieldPriceNego\"]")).select_by_value("Yes")
        Select(self.driver.find_element_by_css_selector("select[name=\"fieldContactMethod\"]")).select_by_value("phone")
        msg_get = self.driver.find_element(by=By.CLASS_NAME, value="fileuploader-thumbnails-input-inner")
        self.driver.execute_script("arguments[0].scrollIntoView()", msg_get)
        self.driver.find_element_by_name("files[]").send_keys(config.hh_img)
        self.clickButton(By.NAME, "submit")
        self.text_compare(how=By.ID, what="inner", expected_txt="Thank you for using our service!")

        # Phone
        print ("####Verify Phone upload####")
        self.clickButton(By.CLASS_NAME, "glyphicon-upload")
        time.sleep(2)
        self.clickButton(By.XPATH, "/html/body/div[2]/div/div/div/div/ul/li[6]/div/a/img")
        time.sleep(2)
        Select(self.driver.find_element_by_css_selector("select[name=\"fieldLocation\"]")).select_by_value("Dire Dawa")
        self.clearTextBox(By.ID, "fieldTitle")
        self.enterValue(By.ID, "fieldTitle", "test phone")
        Select(self.driver.find_element_by_css_selector("select[name=\"idCategory\"]")).select_by_value("Cell Phone")
        Select(self.driver.find_element_by_css_selector("select[name=\"fieldMake\"]")).select_by_value("Alcatel")
        self.clearTextBox(By.ID, "fieldModel")
        self.enterValue(By.ID, "fieldModel", "MOD123")
        Select(self.driver.find_element_by_css_selector("select[name=\"fieldOs\"]")).select_by_value("Windows")
        Select(self.driver.find_element_by_css_selector("select[name=\"fieldCamera\"]")).select_by_value("11.0 - 15.9 MP")
        Select(self.driver.find_element_by_css_selector("select[name=\"fieldStorage\"]")).select_by_value("more than 516GB")
        Select(self.driver.find_element_by_css_selector("select[name=\"fieldColor\"]")).select_by_value("white")
        Select(self.driver.find_element_by_css_selector("select[name=\"fieldPriceCurrency\"]")).select_by_value("ETB")
        self.clearTextBox(By.ID, "fieldPriceSell")
        self.enterValue(By.ID, "fieldPriceSell", "8000")
        Select(self.driver.find_element_by_css_selector("select[name=\"fieldPriceNego\"]")).select_by_value("Yes")
        Select(self.driver.find_element_by_css_selector("select[name=\"fieldContactMethod\"]")).select_by_value("e-mail")
        msg_get = self.driver.find_element(by=By.CLASS_NAME, value="fileuploader-thumbnails-input-inner")
        self.driver.execute_script("arguments[0].scrollIntoView()", msg_get)
        self.driver.find_element_by_name("files[]").send_keys(config.phone_img)
        self.clickButton(By.NAME, "submit")
        self.text_compare(how=By.ID, what="inner", expected_txt="Thank you for using our service!")
		
        # Others
        print ("####Verify Others upload####")
        self.clickButton(By.CLASS_NAME, "glyphicon-upload")
        time.sleep(2)
        self.clickButton(By.XPATH, "/html/body/div[2]/div/div/div/div/ul/li[7]/div/a/img")
        time.sleep(2)
        Select(self.driver.find_element_by_css_selector("select[name=\"fieldLocation\"]")).select_by_value("Arba Minch")
        self.clearTextBox(By.ID, "fieldTitle")
        self.enterValue(By.ID, "fieldTitle", "test others")
        Select(self.driver.find_element_by_css_selector("select[name=\"idCategory\"]")).select_by_value("Entertainment")
        Select(self.driver.find_element_by_css_selector("select[name=\"fieldPriceCurrency\"]")).select_by_value("ETB")
        self.clearTextBox(By.ID, "fieldPriceSell")
        self.enterValue(By.ID, "fieldPriceSell", "3000")
        Select(self.driver.find_element_by_css_selector("select[name=\"fieldPriceNego\"]")).select_by_value("Yes")
        Select(self.driver.find_element_by_css_selector("select[name=\"fieldContactMethod\"]")).select_by_value("phone")
        msg_get = self.driver.find_element(by=By.CLASS_NAME, value="fileuploader-thumbnails-input-inner")
        self.driver.execute_script("arguments[0].scrollIntoView()", msg_get)
        self.driver.find_element_by_name("files[]").send_keys(config.other_img)
        self.clickButton(By.NAME, "submit")
        self.text_compare(how=By.ID, what="inner", expected_txt="Thank you for using our service!")
		
		# Logout
        self.clickButton(By.CLASS_NAME, "glyphicon-log-out")


    def edit_profile(self):
        # Reset the page
        self.clickButton(By.CLASS_NAME, "logo_img")
		
		# Login
        self.login_form()

        # edit profile
        print ("####Verify edit profile####")
        self.clickButton(By.XPATH, "/html/body/div[2]/div/div/div[2]/div[3]/div[1]/div/div/div/div[2]/div[3]/div/a")
		# edit name
        self.clickButton(By.XPATH, "/html/body/div[2]/div/div/div[2]/div/div/p/a")
        self.clearTextBox(By.ID, "fieldFirstName")
        self.enterValue(By.ID, "fieldFirstName", config.user_first_name)
        self.clearTextBox(By.ID, "fieldLastName")
        self.enterValue(By.ID, "fieldLastName", config.user_last_name) 
        self.clickButton(By.CLASS_NAME, "btn-block")
        self.text_compare(how=By.XPATH, what="/html/body/header/div[1]/div/div/div/div[2]/div/div/a[4]/div/span[2]", expected_txt="tester")

        # Change password
        # self.clickButton(By.CLASS_NAME, "glyphicon-home")
        # self.clickButton(By.XPATH, "/html/body/div[2]/div/div/div[2]/div[3]/div[1]/div/div/div/div[2]/div[3]/div/a")
        # self.clickButton(By.XPATH, "/html/body/div[2]/div/div/div[5]/div/div/p/a")
        # self.clearTextBox(By.ID, "fieldPassword")
        # self.enterValue(By.ID, "fieldPassword", config.test_user_password)
        # self.clearTextBox(By.ID, "fieldPasswordRepeat")
        # self.enterValue(By.ID, "fieldPasswordRepeat", config.test_user_new_password)
        # self.clearTextBox(By.ID, "fieldPasswordRepeat2")
        # self.enterValue(By.ID, "fieldPasswordRepeat2", config.test_user_new_password)		
        # self.clickButton(By.CLASS_NAME, "btn-block")
        # self.clickButton(By.CLASS_NAME, "glyphicon-log-out")
		# # Login
        # self.login_form()        
		
		# Logout
        self.clickButton(By.CLASS_NAME, "glyphicon-log-out")


    def your_item(self):
        # Reset the page
        self.clickButton(By.CLASS_NAME, "logo_img")
		
		# Login
        self.login_form()
        
		### your item
		# Active and pending items
        print ("####Verify your time page####")
        time.sleep(2)
        self.clickButton(By.XPATH, "/html/body/div[2]/div/div/div[2]/div[3]/div[2]/div/div/div/div[2]/div[3]/div/a")
        time.sleep(2)
        self.text_compare(how=By.CLASS_NAME, what="item-list-by-status", expected_txt="Active")
        time.sleep(2)
        element_number_dict = {"userActiveNumb": int(self.driver.find_element(by=By.ID, value="userActiveNumb").text), "userPendingNumb": int(self.driver.find_element(by=By.ID, value="userPendingNumb").text)}
        for key in element_number_dict:
            if element_number_dict[key] > 0 and key == "userActiveNumb":
                print ("####Verify item edit####")
                self.clickButton(By.ID, "userActiveNumb")
                self.text_compare(how=By.ID, what="divCommon", expected_txt="Price Details")
				## Edit Item
                self.clickButton(By.XPATH, "/html/body/div[2]/div/div/div/div/div[2]/div/div[1]/div/div/div[2]/div[4]/a")
                Select(self.driver.find_element_by_css_selector("select[name=\"fieldLocation\"]")).select_by_value("Arba Minch")
                time.sleep(1)
                self.clearTextBox(By.ID, "fieldTitle")
                time.sleep(1)
                self.enterValue(By.ID, "fieldTitle", "edit title")
                time.sleep(1)
                msg_get = self.driver.find_element(by=By.CLASS_NAME, value="fileuploader-thumbnails-input-inner")
                self.driver.execute_script("arguments[0].scrollIntoView()", msg_get)
                time.sleep(2)
                self.clickButton(By.NAME, "submit")
                self.text_compare(how=By.ID, what="inner", expected_txt="Thank you for using our service!")
				
            elif element_number_dict[key] > 0 and key == "userPendingNumb":
                self.clickButton(By.ID, "userPendingNumb")
                self.text_compare(how=By.ID, what="divCommon", expected_txt="Price Details")

		# Post item
        print ("####Verify PostItem in your item page####")
        self.clickButton(By.CLASS_NAME, "glyphicon-home")
        self.clickButton(By.XPATH, "/html/body/div[2]/div/div/div[2]/div[3]/div[2]/div/div/div/div[2]/div[3]/div/a")
        self.clickButton(By.XPATH, "/html/body/div[2]/div/div/div/div/div[1]/div/a[3]/div/span")
        self.text_compare(how=By.ID, what="sidelist", expected_txt="Choose Item to upload")            			
	    
		# Logout
        self.clickButton(By.CLASS_NAME, "glyphicon-log-out")

		
    def pass_recovery(self):
        # Reset the page
        self.clickButton(By.CLASS_NAME, "logo_img")
		
        # Login success
        print ("####Verify password recovery####")
        self.clickButton(By.CLASS_NAME, "glyphicon-log-in")
        self.clickButton(By.CLASS_NAME, "pull-right")
        self.clearTextBox(By.ID, "fieldEmail")
        self.enterValue(By.ID, "fieldEmail", config.test_user_email_existing) 
        self.clickButton(By.NAME, "submit")
        self.text_compare(how=By.ID, what="inner", expected_txt="Password recovery information has now been sent to the e-mail associated with this user.")		

        		
    def text_compare(self, how, what, expected_txt):
        msg_get = self.driver.find_element(by=how, value=what).text
        self.assertIn(expected_txt, msg_get)	    

			
    def find_el(self, how, what):
        try: h = self.driver.find_element(by=how, value=what)
        except NoSuchElementException as e: return False
        return h

		
    def enterValue(self, how, what, enter):
        find_el_var = self.find_el(how, what)
        if not find_el_var:
            self.assertTrue(find_el_var)
        else:
            find_el_var.send_keys(enter)

			
    def clickButton(self, by, what):
        find_el_var = self.find_el(by, what)
        if not find_el_var:
            self.assertTrue(find_el_var)
        else:
            find_el_var.click()

	
    def clearTextBox(self, by, what):
        find_el_var = self.find_el(by, what)
        if not find_el_var:
            self.assertTrue(find_el_var)
        else:
            find_el_var.clear()

			
    def tearDown(self):
        time.sleep(5)
        self.driver.quit()


if __name__ == "__main__":
    unittest.main(testRunner=HtmlTestRunner.HTMLTestRunner(output=config.test_report_path))
	
