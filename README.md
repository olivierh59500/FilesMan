# FilesMan

The files were located under the upload folder.

1. Our coworker has added a WordPress addon so that our company can send email news to our customers (once per month) and potensial customers. He said that the addon is known addon installed by thouzands of people.
2. Several days later our other emails (normal emails) were marked as spam.
3. We were trying to make sure we have reverse DNS etc so that our emails won't fall under spam.
4. Several days later appeared that our server has send near 20 000 000 emails within a week.
5. Our employer and and another Linux system administrator has stopped the email server Zymbra.
6. Few days later when our employer activated Zymbra, spam emails were still being send. Re-deactivate Zybra.
7. Few days later I tought to look at the WordPress upload folder (normally this is not my job to look there, I have other works, and the WP guy is not me but someone else)
8. There it was. At thow WP sites. Both were infected.
9. We have updated and reinstalled WP.
10. I have suggested to reinstall the Linux server. Rejected beause of too much work.
11. I have suggested to upgrade PHP from 5.3 to 5.4. Accepted but will be done later.
12. We don't know what security hole was used. PHP? Apcahe? WordPress? WordPress plugin? File permissions? Lol, the upload folder had all permissions.