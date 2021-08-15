==========README==============

==========This is a readme file for Huluter.com test-automation========
In order to run the automation code, one needs to follow the following instruction
 1) Install python3 (https://www.python.org/downloads/) . Make sure to put the python path in the environment variable.
 2) Download selenium webdriver preferebly chromedriver (https://chromedriver.chromium.org/downloads). It's possible to install other browser drivers as well like firefox driver.
 3) Place the webdriver in python dir
 4) Install ChromeDriverManager and HtmlTestRunner modules (run this command on cmd: pip install ChromeDriverManager and pip install html-testRunner)
 5) You can choose the versions for testing which means the local version or the online HT version. You can specify the link in the config file.
 6) You need to specify a path to select an image for Item Upload testing.(Check config file)
 7) Upon finishing the test execution, it'll save the test report in a HTML format within a path that you should provide in test_report_path variable (check the config file) 
 8) There are two ways of executing this test. One way is to run the "test_cases.py" file and it'll execute on the CLI which means it'll run headlessly. The other way is, you run the test_cases.py in cmd/text-editor then it'll automatically open a browser and do the testing by itself on the page. The code for both ways is already included in the test-code so you can choose which way you want to run it....uncomment "Headless" to run headlessly which means without opening the page.
 
 N.B: One or two TCs might fail so try to re-run and check the result again.
