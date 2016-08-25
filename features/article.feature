@api
Feature: Article Content Type
  As a Content Editor,
  I want to create an article,
  So I can provide timely updates for my users.

  Scenario: Validate the article content type has the expected fields.
    Given I am logged in as a user with the "editor" role
    Then the form at "node/add/article" has the expected fields:
      | field                    | tag        | type             |
      | title                    | textfield  | text             |
      | field-article-summary    | textarea   |                  |
      | field-article-paragraphs | paragraphs | paragraphs-text  |
      | field-article-paragraphs | paragraphs | paragraphs-image |

  Scenario: Ensure the Editor role has the expected article permissions.
    Given I am logged in as a user with the "editor" role
    Then the "editor" role should have the permissions:
      | permission                 |
      | create article content     |
      | delete own article content |
      | edit any article content   |
      | edit own article content   |
      | revert article revisions   |
      | view article revisions     |
