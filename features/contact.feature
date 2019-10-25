# ser story for demonstration only.
# Learn how to get started with Behat and BDD on Behat's website:
# http://behat.org/en/latest/quick_start.html

@kalidou 

Feature:
  formContact

  Scenario: the email is wrong
    Given I am on "/contact"
    When I fill in "contact_email" with "toto"
    When I press "Send"
    Then I should see "400" 
  
