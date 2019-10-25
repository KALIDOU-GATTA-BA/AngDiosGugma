# This file contains a user story for demonstration only.
# Learn how to get started with Behat and BDD on Behat's website:
# http://behat.org/en/latest/quick_start.html

Feature:
  homePage

  Scenario: the page loads successfuly
    Given I am on "/"
    Then I should see "KALIDOU GATTA BA"
  
