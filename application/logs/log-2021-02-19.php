<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-02-19 00:17:00 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 130
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 00:18:03 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 00:18:28 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles"."user_id" = '113'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10 OFFSET 10
ERROR - 2021-02-19 00:18:29 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles"."user_id" = '113'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 00:19:45 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 130
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 00:31:22 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 00:31:35 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles"."user_id" = '113'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10 OFFSET 10
ERROR - 2021-02-19 00:31:36 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles"."user_id" = '113'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 00:40:43 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 111
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 00:44:14 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 130
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 00:44:57 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 111
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 00:45:32 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 130
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 00:47:35 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 111
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 00:48:57 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 111
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 00:51:45 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 111
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 00:53:22 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 111
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 00:53:46 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 111
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 00:59:06 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 111
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 00:59:14 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 111
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 00:59:18 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 111
AND "articles_translate_i18"."article_site_id" = 'altametrics.com'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 00:59:20 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 111
AND "articles_translate_i18"."article_site_id" = 'altametrics.com'
AND "articles"."article_type" = 'pillar'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 01:04:53 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 111
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 01:05:06 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 111
AND "articles_translate_i18"."article_site_id" = 'altametrics.com'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 01:05:10 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 111
AND "articles_translate_i18"."article_site_id" = 'altametrics.com'
AND "articles"."article_type" = 'pillar'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 01:05:30 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 130
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 01:06:35 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 01:06:42 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles"."user_id" = '113'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10 OFFSET 10
ERROR - 2021-02-19 01:06:43 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles"."user_id" = '113'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 01:08:00 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 130
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 01:09:20 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 111
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 01:10:04 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 01:26:51 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 130
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 01:27:49 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10 OFFSET 10
ERROR - 2021-02-19 01:27:50 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 01:27:55 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles"."user_id" = '130'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 01:28:24 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 01:28:30 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_site_id" = 'hubworks.com'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 01:28:34 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 01:29:53 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 130
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 01:30:24 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 130
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 01:31:08 --> Severity: error --> Exception: Too few arguments to function Articlemaster::get_permalink(), 2 passed in /var/www/html/writerportal/system/core/CodeIgniter.php on line 532 and exactly 3 expected /var/www/html/writerportal/application/controllers/Articlemaster.php 482
ERROR - 2021-02-19 01:36:23 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 01:36:49 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles"."user_id" = '113'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10 OFFSET 10
ERROR - 2021-02-19 01:36:50 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles"."user_id" = '113'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 01:41:22 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 130
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 01:42:04 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 130
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 01:43:42 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 01:43:48 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles"."user_id" = '113'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10 OFFSET 10
ERROR - 2021-02-19 01:43:48 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles"."user_id" = '113'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 01:43:59 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 01:45:13 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles"."user_id" = '130'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 03:36:13 --> 404 Page Not Found: Robotstxt/index
ERROR - 2021-02-19 04:27:10 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 04:27:14 --> 404 Page Not Found: Faviconico/index
ERROR - 2021-02-19 04:27:17 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 04:50:17 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 04:50:26 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles"."user_id" = '130'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 04:57:29 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 05:13:13 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 05:13:25 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10 OFFSET 10
ERROR - 2021-02-19 05:13:26 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 05:13:34 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles"."user_id" = '130'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10 OFFSET 10
ERROR - 2021-02-19 05:13:35 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles"."user_id" = '130'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 05:23:14 --> 404 Page Not Found: Robotstxt/index
ERROR - 2021-02-19 05:23:46 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 05:28:36 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 05:29:00 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles"."user_id" = '130'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10 OFFSET 10
ERROR - 2021-02-19 05:29:00 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles"."user_id" = '130'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 05:32:59 --> 404 Page Not Found: Robotstxt/index
ERROR - 2021-02-19 05:43:29 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 05:44:41 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles"."user_id" = '130'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10 OFFSET 10
ERROR - 2021-02-19 05:44:42 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles"."user_id" = '130'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 05:55:07 --> Severity: Notice --> Undefined index: article_promo_channel_social_id /var/www/html/writerportal/application/controllers/cron/Hootsuiteapicron.php 147
ERROR - 2021-02-19 05:55:07 --> Severity: Notice --> Undefined index: site_id /var/www/html/writerportal/application/controllers/cron/Hootsuiteapicron.php 148
ERROR - 2021-02-19 05:55:07 --> Severity: Notice --> Undefined index: article_promo_channel /var/www/html/writerportal/application/controllers/cron/Hootsuiteapicron.php 149
ERROR - 2021-02-19 05:55:07 --> Severity: Notice --> Undefined index: article_promo_channel_social_id /var/www/html/writerportal/application/controllers/cron/Hootsuiteapicron.php 153
ERROR - 2021-02-19 05:55:07 --> Severity: Notice --> Undefined index: article_promo_channel_social_id /var/www/html/writerportal/application/controllers/cron/Hootsuiteapicron.php 154
ERROR - 2021-02-19 05:55:34 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 05:55:58 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles"."user_id" = '130'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10 OFFSET 10
ERROR - 2021-02-19 05:55:59 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles"."user_id" = '130'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 05:56:49 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles"."user_id" = '130'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10 OFFSET 10
ERROR - 2021-02-19 05:56:50 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles"."user_id" = '130'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 07:23:51 --> 404 Page Not Found: Robotstxt/index
ERROR - 2021-02-19 07:57:44 --> 404 Page Not Found: Faviconico/index
ERROR - 2021-02-19 08:14:18 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 08:14:22 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles"."user_id" = '130'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 08:19:13 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 08:20:01 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles"."user_id" = '130'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10 OFFSET 10
ERROR - 2021-02-19 08:20:02 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles"."user_id" = '130'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 08:25:03 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 08:25:17 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles"."user_id" = '130'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10 OFFSET 10
ERROR - 2021-02-19 08:25:18 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles"."user_id" = '130'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 08:35:36 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 08:35:42 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles"."user_id" = '130'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10 OFFSET 10
ERROR - 2021-02-19 08:35:43 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles"."user_id" = '130'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 11:26:03 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 11:30:25 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10 OFFSET 10
ERROR - 2021-02-19 11:30:31 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10 OFFSET 20
ERROR - 2021-02-19 11:30:33 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10 OFFSET 30
ERROR - 2021-02-19 12:10:06 --> 404 Page Not Found: Faviconico/index
ERROR - 2021-02-19 14:49:02 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 16:29:12 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 111
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 16:57:03 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 17:00:37 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 17:04:08 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 17:06:35 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 17:07:52 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 17:08:03 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10 OFFSET 10
ERROR - 2021-02-19 17:08:47 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 17:09:08 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10 OFFSET 10
ERROR - 2021-02-19 17:10:18 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 17:10:23 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10 OFFSET 10
ERROR - 2021-02-19 17:10:35 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 17:10:42 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10 OFFSET 10
ERROR - 2021-02-19 17:11:13 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 17:11:21 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10 OFFSET 10
ERROR - 2021-02-19 17:12:28 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 17:12:31 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10 OFFSET 20
ERROR - 2021-02-19 17:12:34 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10 OFFSET 30
ERROR - 2021-02-19 17:13:25 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 17:13:27 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10 OFFSET 20
ERROR - 2021-02-19 17:13:30 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10 OFFSET 10
ERROR - 2021-02-19 17:13:34 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10 OFFSET 30
ERROR - 2021-02-19 17:14:18 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 17:14:21 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10 OFFSET 20
ERROR - 2021-02-19 17:14:22 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10 OFFSET 30
ERROR - 2021-02-19 17:14:25 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10 OFFSET 40
ERROR - 2021-02-19 17:14:28 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 17:18:37 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 17:20:54 --> 404 Page Not Found: Faviconico/index
ERROR - 2021-02-19 17:20:54 --> 404 Page Not Found: Faviconico/index
ERROR - 2021-02-19 17:34:09 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%wo%'
OR article_user.user_email ILIKE '%wo%'
OR article_user.user_fname ILIKE '%wo%'
OR article_user.user_lname ILIKE '%wo%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 17:34:10 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%wo%'
OR article_user.user_email ILIKE '%wo%'
OR article_user.user_fname ILIKE '%wo%'
OR article_user.user_lname ILIKE '%wo%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 17:34:10 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%work%'
OR article_user.user_email ILIKE '%work%'
OR article_user.user_fname ILIKE '%work%'
OR article_user.user_lname ILIKE '%work%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 17:34:10 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%work%'
OR article_user.user_email ILIKE '%work%'
OR article_user.user_fname ILIKE '%work%'
OR article_user.user_lname ILIKE '%work%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 17:34:10 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%work p%'
OR article_user.user_email ILIKE '%work p%'
OR article_user.user_fname ILIKE '%work p%'
OR article_user.user_lname ILIKE '%work p%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 17:34:10 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%work per%'
OR article_user.user_email ILIKE '%work per%'
OR article_user.user_fname ILIKE '%work per%'
OR article_user.user_lname ILIKE '%work per%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 17:34:11 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%work perf%'
OR article_user.user_email ILIKE '%work perf%'
OR article_user.user_fname ILIKE '%work perf%'
OR article_user.user_lname ILIKE '%work perf%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 17:34:11 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%work perfor%'
OR article_user.user_email ILIKE '%work perfor%'
OR article_user.user_fname ILIKE '%work perfor%'
OR article_user.user_lname ILIKE '%work perfor%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 17:34:11 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%work pe%'
OR article_user.user_email ILIKE '%work pe%'
OR article_user.user_fname ILIKE '%work pe%'
OR article_user.user_lname ILIKE '%work pe%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 17:34:11 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%work performa%'
OR article_user.user_email ILIKE '%work performa%'
OR article_user.user_fname ILIKE '%work performa%'
OR article_user.user_lname ILIKE '%work performa%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 17:34:11 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%work performa%'
OR article_user.user_email ILIKE '%work performa%'
OR article_user.user_fname ILIKE '%work performa%'
OR article_user.user_lname ILIKE '%work performa%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 17:34:12 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%work performanc%'
OR article_user.user_email ILIKE '%work performanc%'
OR article_user.user_fname ILIKE '%work performanc%'
OR article_user.user_lname ILIKE '%work performanc%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 17:34:12 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%work performance%'
OR article_user.user_email ILIKE '%work performance%'
OR article_user.user_fname ILIKE '%work performance%'
OR article_user.user_lname ILIKE '%work performance%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 17:34:12 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%work pe%'
OR article_user.user_email ILIKE '%work pe%'
OR article_user.user_fname ILIKE '%work pe%'
OR article_user.user_lname ILIKE '%work pe%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 17:34:12 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%work performance%'
OR article_user.user_email ILIKE '%work performance%'
OR article_user.user_fname ILIKE '%work performance%'
OR article_user.user_lname ILIKE '%work performance%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 17:34:12 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%work performance%'
OR article_user.user_email ILIKE '%work performance%'
OR article_user.user_fname ILIKE '%work performance%'
OR article_user.user_lname ILIKE '%work performance%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 17:34:13 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%work perfor%'
OR article_user.user_email ILIKE '%work perfor%'
OR article_user.user_fname ILIKE '%work perfor%'
OR article_user.user_lname ILIKE '%work perfor%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 17:34:13 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%work performanc%'
OR article_user.user_email ILIKE '%work performanc%'
OR article_user.user_fname ILIKE '%work performanc%'
OR article_user.user_lname ILIKE '%work performanc%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 17:36:46 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 17:36:47 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%c%'
OR article_user.user_email ILIKE '%c%'
OR article_user.user_fname ILIKE '%c%'
OR article_user.user_lname ILIKE '%c%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 17:36:47 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%cr%'
OR article_user.user_email ILIKE '%cr%'
OR article_user.user_fname ILIKE '%cr%'
OR article_user.user_lname ILIKE '%cr%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 17:36:48 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%cros%'
OR article_user.user_email ILIKE '%cros%'
OR article_user.user_fname ILIKE '%cros%'
OR article_user.user_lname ILIKE '%cros%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 17:36:48 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%cross %'
OR article_user.user_email ILIKE '%cross %'
OR article_user.user_fname ILIKE '%cross %'
OR article_user.user_lname ILIKE '%cross %'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 17:36:48 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%cross %'
OR article_user.user_email ILIKE '%cross %'
OR article_user.user_fname ILIKE '%cross %'
OR article_user.user_lname ILIKE '%cross %'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 17:36:48 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%cross t%'
OR article_user.user_email ILIKE '%cross t%'
OR article_user.user_fname ILIKE '%cross t%'
OR article_user.user_lname ILIKE '%cross t%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 17:36:48 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%cro%'
OR article_user.user_email ILIKE '%cro%'
OR article_user.user_fname ILIKE '%cro%'
OR article_user.user_lname ILIKE '%cro%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 17:36:48 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%cross team%'
OR article_user.user_email ILIKE '%cross team%'
OR article_user.user_fname ILIKE '%cross team%'
OR article_user.user_lname ILIKE '%cross team%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 17:36:49 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%cross te%'
OR article_user.user_email ILIKE '%cross te%'
OR article_user.user_fname ILIKE '%cross te%'
OR article_user.user_lname ILIKE '%cross te%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 17:36:49 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%cross team%'
OR article_user.user_email ILIKE '%cross team%'
OR article_user.user_fname ILIKE '%cross team%'
OR article_user.user_lname ILIKE '%cross team%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 17:36:52 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%cross team%'
OR article_user.user_email ILIKE '%cross team%'
OR article_user.user_fname ILIKE '%cross team%'
OR article_user.user_lname ILIKE '%cross team%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 17:37:01 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 17:38:27 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_site_id" = 'zipschedules.com'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 17:38:29 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_site_id" = 'zipreporting.com'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 17:38:41 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_site_id" = 'zipschedules.com'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 17:54:23 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 124
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 18:04:57 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 111
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 18:09:04 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 124
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 18:09:26 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 124
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10 OFFSET 10
ERROR - 2021-02-19 18:09:27 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_site_id" = 'zipreporting.com'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 18:09:45 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 124
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 18:10:04 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_site_id" = 'zipschedules.com'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 18:10:07 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_site_id" = 'zipschedules.com'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10 OFFSET 10
ERROR - 2021-02-19 18:10:29 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_site_id" = 'zipschedules.com'
AND "articles"."user_id" = '124'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 18:10:36 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_site_id" = 'zipschedules.com'
AND "articles"."user_id" = '124'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10 OFFSET 10
ERROR - 2021-02-19 18:10:48 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_site_id" = 'zipschedules.com'
AND "articles"."user_id" = '124'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 18:12:09 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 111
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 18:15:11 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 153
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 18:16:13 --> 404 Page Not Found: Faviconico/index
ERROR - 2021-02-19 18:16:52 --> 404 Page Not Found: Faviconico/index
ERROR - 2021-02-19 18:16:53 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 111
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 18:16:54 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 153
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 18:20:56 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 111
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 18:23:52 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 111
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 18:32:45 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 130
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 18:32:59 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 130
AND "articles"."article_type" = 'pillar'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 18:33:04 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 130
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 18:33:27 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 130
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10 OFFSET 10
ERROR - 2021-02-19 18:33:35 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 130
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 19:07:42 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 153
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 19:23:40 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 19:23:44 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_status" = 'pending'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 19:24:01 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles"."user_id" = '130'
AND "articles_translate_i18"."article_status" = 'pending'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 19:26:29 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 19:30:29 --> 404 Page Not Found: Assets/vendor
ERROR - 2021-02-19 19:30:32 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 19:30:33 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_status" = 'pending'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 19:30:40 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles"."user_id" = '130'
AND "articles_translate_i18"."article_status" = 'pending'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 19:30:45 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles"."user_id" = '113'
AND "articles_translate_i18"."article_status" = 'pending'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 19:39:25 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 19:39:32 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 19:39:41 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles"."user_id" = '113'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 19:39:43 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles"."user_id" = '113'
AND "articles_translate_i18"."article_status" = 'pending'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 21:10:50 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 124
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 21:28:15 --> 404 Page Not Found: Apple-touch-icon-precomposedpng/index
ERROR - 2021-02-19 21:28:15 --> 404 Page Not Found: Apple-touch-iconpng/index
ERROR - 2021-02-19 21:28:23 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 113
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 21:29:08 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 21:30:48 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 21:36:46 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 21:38:16 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 21:45:39 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 124
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 21:47:05 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 21:47:06 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_status" = 'pending'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 21:47:10 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles"."user_id" = '130'
AND "articles_translate_i18"."article_status" = 'pending'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 21:47:24 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles"."user_id" = '113'
AND "articles_translate_i18"."article_status" = 'pending'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 21:47:46 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 21:48:47 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 111
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 21:49:34 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 21:49:50 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 113
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 21:52:29 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 113
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 21:53:19 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 111
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 21:56:43 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 111
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 21:57:21 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 111
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:00:00 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 111
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:00:20 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 111
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:01:55 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 111
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:02:17 --> 404 Page Not Found: Assets/vendor
ERROR - 2021-02-19 22:02:19 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:02:20 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 111
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:02:42 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%8 effective lead time reduction strategies to implement%'
OR article_user.user_email ILIKE '%8 effective lead time reduction strategies to implement%'
OR article_user.user_fname ILIKE '%8 effective lead time reduction strategies to implement%'
OR article_user.user_lname ILIKE '%8 effective lead time reduction strategies to implement%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:02:42 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%8 effective lead time reduction strategies to implement%'
OR article_user.user_email ILIKE '%8 effective lead time reduction strategies to implement%'
OR article_user.user_fname ILIKE '%8 effective lead time reduction strategies to implement%'
OR article_user.user_lname ILIKE '%8 effective lead time reduction strategies to implement%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:02:43 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%8 effective lead time reduction strategies to implement%'
OR article_user.user_email ILIKE '%8 effective lead time reduction strategies to implement%'
OR article_user.user_fname ILIKE '%8 effective lead time reduction strategies to implement%'
OR article_user.user_lname ILIKE '%8 effective lead time reduction strategies to implement%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:03:03 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 111
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:03:06 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%how to lower shipping costs for small businesses – 4 ideas%'
OR article_user.user_email ILIKE '%how to lower shipping costs for small businesses – 4 ideas%'
OR article_user.user_fname ILIKE '%how to lower shipping costs for small businesses – 4 ideas%'
OR article_user.user_lname ILIKE '%how to lower shipping costs for small businesses – 4 ideas%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:03:06 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%how to lower shipping costs for small businesses – 4 ideas%'
OR article_user.user_email ILIKE '%how to lower shipping costs for small businesses – 4 ideas%'
OR article_user.user_fname ILIKE '%how to lower shipping costs for small businesses – 4 ideas%'
OR article_user.user_lname ILIKE '%how to lower shipping costs for small businesses – 4 ideas%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:03:07 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%how to lower shipping costs for small businesses – 4 ideas%'
OR article_user.user_email ILIKE '%how to lower shipping costs for small businesses – 4 ideas%'
OR article_user.user_fname ILIKE '%how to lower shipping costs for small businesses – 4 ideas%'
OR article_user.user_lname ILIKE '%how to lower shipping costs for small businesses – 4 ideas%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:03:35 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%how to calculate fulfillment costs%'
OR article_user.user_email ILIKE '%how to calculate fulfillment costs%'
OR article_user.user_fname ILIKE '%how to calculate fulfillment costs%'
OR article_user.user_lname ILIKE '%how to calculate fulfillment costs%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:03:35 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%how to calculate fulfillment costs%'
OR article_user.user_email ILIKE '%how to calculate fulfillment costs%'
OR article_user.user_fname ILIKE '%how to calculate fulfillment costs%'
OR article_user.user_lname ILIKE '%how to calculate fulfillment costs%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:03:36 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%how to calculate fulfillment costs%'
OR article_user.user_email ILIKE '%how to calculate fulfillment costs%'
OR article_user.user_fname ILIKE '%how to calculate fulfillment costs%'
OR article_user.user_lname ILIKE '%how to calculate fulfillment costs%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:03:53 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%invoice processing steps – guide to efficient invoice management%'
OR article_user.user_email ILIKE '%invoice processing steps – guide to efficient invoice management%'
OR article_user.user_fname ILIKE '%invoice processing steps – guide to efficient invoice management%'
OR article_user.user_lname ILIKE '%invoice processing steps – guide to efficient invoice management%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:03:53 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%invoice processing steps – guide to efficient invoice management%'
OR article_user.user_email ILIKE '%invoice processing steps – guide to efficient invoice management%'
OR article_user.user_fname ILIKE '%invoice processing steps – guide to efficient invoice management%'
OR article_user.user_lname ILIKE '%invoice processing steps – guide to efficient invoice management%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:03:54 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%invoice processing steps – guide to efficient invoice management%'
OR article_user.user_email ILIKE '%invoice processing steps – guide to efficient invoice management%'
OR article_user.user_fname ILIKE '%invoice processing steps – guide to efficient invoice management%'
OR article_user.user_lname ILIKE '%invoice processing steps – guide to efficient invoice management%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:04:11 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%accounts payable and receivable – what’s the difference?%'
OR article_user.user_email ILIKE '%accounts payable and receivable – what’s the difference?%'
OR article_user.user_fname ILIKE '%accounts payable and receivable – what’s the difference?%'
OR article_user.user_lname ILIKE '%accounts payable and receivable – what’s the difference?%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:04:11 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%accounts payable and receivable – what’s the difference?%'
OR article_user.user_email ILIKE '%accounts payable and receivable – what’s the difference?%'
OR article_user.user_fname ILIKE '%accounts payable and receivable – what’s the difference?%'
OR article_user.user_lname ILIKE '%accounts payable and receivable – what’s the difference?%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:04:12 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%accounts payable and receivable – what’s the difference?%'
OR article_user.user_email ILIKE '%accounts payable and receivable – what’s the difference?%'
OR article_user.user_fname ILIKE '%accounts payable and receivable – what’s the difference?%'
OR article_user.user_lname ILIKE '%accounts payable and receivable – what’s the difference?%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:06:35 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 113
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:08:53 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%restaurant organization – 7 best practices for management%'
OR article_user.user_email ILIKE '%restaurant organization – 7 best practices for management%'
OR article_user.user_fname ILIKE '%restaurant organization – 7 best practices for management%'
OR article_user.user_lname ILIKE '%restaurant organization – 7 best practices for management%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:08:53 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%restaurant organization – 7 best practices for management%'
OR article_user.user_email ILIKE '%restaurant organization – 7 best practices for management%'
OR article_user.user_fname ILIKE '%restaurant organization – 7 best practices for management%'
OR article_user.user_lname ILIKE '%restaurant organization – 7 best practices for management%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:08:57 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%restaurant organization %'
OR article_user.user_email ILIKE '%restaurant organization %'
OR article_user.user_fname ILIKE '%restaurant organization %'
OR article_user.user_lname ILIKE '%restaurant organization %'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:08:58 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%restaurant organization%'
OR article_user.user_email ILIKE '%restaurant organization%'
OR article_user.user_fname ILIKE '%restaurant organization%'
OR article_user.user_lname ILIKE '%restaurant organization%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:08:58 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%restaurant organization%'
OR article_user.user_email ILIKE '%restaurant organization%'
OR article_user.user_fname ILIKE '%restaurant organization%'
OR article_user.user_lname ILIKE '%restaurant organization%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:08:58 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%restaurant organization%'
OR article_user.user_email ILIKE '%restaurant organization%'
OR article_user.user_fname ILIKE '%restaurant organization%'
OR article_user.user_lname ILIKE '%restaurant organization%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:09:20 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%how to use the inventory carrying cost formula%'
OR article_user.user_email ILIKE '%how to use the inventory carrying cost formula%'
OR article_user.user_fname ILIKE '%how to use the inventory carrying cost formula%'
OR article_user.user_lname ILIKE '%how to use the inventory carrying cost formula%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:09:20 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%how to use the inventory carrying cost formula%'
OR article_user.user_email ILIKE '%how to use the inventory carrying cost formula%'
OR article_user.user_fname ILIKE '%how to use the inventory carrying cost formula%'
OR article_user.user_lname ILIKE '%how to use the inventory carrying cost formula%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:09:22 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%how to use the inventory carrying cost formula%'
OR article_user.user_email ILIKE '%how to use the inventory carrying cost formula%'
OR article_user.user_fname ILIKE '%how to use the inventory carrying cost formula%'
OR article_user.user_lname ILIKE '%how to use the inventory carrying cost formula%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:09:58 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%inventory aging report – what it is and why it matters%'
OR article_user.user_email ILIKE '%inventory aging report – what it is and why it matters%'
OR article_user.user_fname ILIKE '%inventory aging report – what it is and why it matters%'
OR article_user.user_lname ILIKE '%inventory aging report – what it is and why it matters%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:09:58 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%inventory aging report – what it is and why it matters%'
OR article_user.user_email ILIKE '%inventory aging report – what it is and why it matters%'
OR article_user.user_fname ILIKE '%inventory aging report – what it is and why it matters%'
OR article_user.user_lname ILIKE '%inventory aging report – what it is and why it matters%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:10:04 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 113
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:10:05 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%inventory aging report %'
OR article_user.user_email ILIKE '%inventory aging report %'
OR article_user.user_fname ILIKE '%inventory aging report %'
OR article_user.user_lname ILIKE '%inventory aging report %'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:10:05 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%inventory aging report%'
OR article_user.user_email ILIKE '%inventory aging report%'
OR article_user.user_fname ILIKE '%inventory aging report%'
OR article_user.user_lname ILIKE '%inventory aging report%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:10:07 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%inventory aging report%'
OR article_user.user_email ILIKE '%inventory aging report%'
OR article_user.user_fname ILIKE '%inventory aging report%'
OR article_user.user_lname ILIKE '%inventory aging report%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:10:35 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%how to make an inventory adjustment%'
OR article_user.user_email ILIKE '%how to make an inventory adjustment%'
OR article_user.user_fname ILIKE '%how to make an inventory adjustment%'
OR article_user.user_lname ILIKE '%how to make an inventory adjustment%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:10:35 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%how to make an inventory adjustment%'
OR article_user.user_email ILIKE '%how to make an inventory adjustment%'
OR article_user.user_fname ILIKE '%how to make an inventory adjustment%'
OR article_user.user_lname ILIKE '%how to make an inventory adjustment%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:10:36 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%how to make an inventory adjustment%'
OR article_user.user_email ILIKE '%how to make an inventory adjustment%'
OR article_user.user_fname ILIKE '%how to make an inventory adjustment%'
OR article_user.user_lname ILIKE '%how to make an inventory adjustment%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:11:01 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%how to use the reorder point formula to optimize inventory%'
OR article_user.user_email ILIKE '%how to use the reorder point formula to optimize inventory%'
OR article_user.user_fname ILIKE '%how to use the reorder point formula to optimize inventory%'
OR article_user.user_lname ILIKE '%how to use the reorder point formula to optimize inventory%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:11:02 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%how to use the reorder point formula to optimize inventory%'
OR article_user.user_email ILIKE '%how to use the reorder point formula to optimize inventory%'
OR article_user.user_fname ILIKE '%how to use the reorder point formula to optimize inventory%'
OR article_user.user_lname ILIKE '%how to use the reorder point formula to optimize inventory%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:11:02 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%how to use the reorder point formula to optimize inventory%'
OR article_user.user_email ILIKE '%how to use the reorder point formula to optimize inventory%'
OR article_user.user_fname ILIKE '%how to use the reorder point formula to optimize inventory%'
OR article_user.user_lname ILIKE '%how to use the reorder point formula to optimize inventory%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:11:27 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%7 product recommendation strategies to boost sales and retention%'
OR article_user.user_email ILIKE '%7 product recommendation strategies to boost sales and retention%'
OR article_user.user_fname ILIKE '%7 product recommendation strategies to boost sales and retention%'
OR article_user.user_lname ILIKE '%7 product recommendation strategies to boost sales and retention%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:11:27 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%7 product recommendation strategies to boost sales and retention%'
OR article_user.user_email ILIKE '%7 product recommendation strategies to boost sales and retention%'
OR article_user.user_fname ILIKE '%7 product recommendation strategies to boost sales and retention%'
OR article_user.user_lname ILIKE '%7 product recommendation strategies to boost sales and retention%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:11:29 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%7 product recommendation strategies to boost sales and retention%'
OR article_user.user_email ILIKE '%7 product recommendation strategies to boost sales and retention%'
OR article_user.user_fname ILIKE '%7 product recommendation strategies to boost sales and retention%'
OR article_user.user_lname ILIKE '%7 product recommendation strategies to boost sales and retention%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:11:55 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%sku proliferation – definition, causes, and more%'
OR article_user.user_email ILIKE '%sku proliferation – definition, causes, and more%'
OR article_user.user_fname ILIKE '%sku proliferation – definition, causes, and more%'
OR article_user.user_lname ILIKE '%sku proliferation – definition, causes, and more%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:11:55 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%sku proliferation – definition, causes, and more%'
OR article_user.user_email ILIKE '%sku proliferation – definition, causes, and more%'
OR article_user.user_fname ILIKE '%sku proliferation – definition, causes, and more%'
OR article_user.user_lname ILIKE '%sku proliferation – definition, causes, and more%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:11:59 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%sku proliferation %'
OR article_user.user_email ILIKE '%sku proliferation %'
OR article_user.user_fname ILIKE '%sku proliferation %'
OR article_user.user_lname ILIKE '%sku proliferation %'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:11:59 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%sku proliferation%'
OR article_user.user_email ILIKE '%sku proliferation%'
OR article_user.user_fname ILIKE '%sku proliferation%'
OR article_user.user_lname ILIKE '%sku proliferation%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:12:00 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%sku proliferation%'
OR article_user.user_email ILIKE '%sku proliferation%'
OR article_user.user_fname ILIKE '%sku proliferation%'
OR article_user.user_lname ILIKE '%sku proliferation%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:12:19 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%supply chain data analytics – 3 strategies for businesses%'
OR article_user.user_email ILIKE '%supply chain data analytics – 3 strategies for businesses%'
OR article_user.user_fname ILIKE '%supply chain data analytics – 3 strategies for businesses%'
OR article_user.user_lname ILIKE '%supply chain data analytics – 3 strategies for businesses%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:12:19 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%supply chain data analytics – 3 strategies for businesses%'
OR article_user.user_email ILIKE '%supply chain data analytics – 3 strategies for businesses%'
OR article_user.user_fname ILIKE '%supply chain data analytics – 3 strategies for businesses%'
OR article_user.user_lname ILIKE '%supply chain data analytics – 3 strategies for businesses%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:12:22 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%supply chain data analytics%'
OR article_user.user_email ILIKE '%supply chain data analytics%'
OR article_user.user_fname ILIKE '%supply chain data analytics%'
OR article_user.user_lname ILIKE '%supply chain data analytics%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:12:24 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%supply chain data analytics%'
OR article_user.user_email ILIKE '%supply chain data analytics%'
OR article_user.user_fname ILIKE '%supply chain data analytics%'
OR article_user.user_lname ILIKE '%supply chain data analytics%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:12:41 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%what is the universal product code? guide for beginners%'
OR article_user.user_email ILIKE '%what is the universal product code? guide for beginners%'
OR article_user.user_fname ILIKE '%what is the universal product code? guide for beginners%'
OR article_user.user_lname ILIKE '%what is the universal product code? guide for beginners%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:12:41 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%what is the universal product code? guide for beginners%'
OR article_user.user_email ILIKE '%what is the universal product code? guide for beginners%'
OR article_user.user_fname ILIKE '%what is the universal product code? guide for beginners%'
OR article_user.user_lname ILIKE '%what is the universal product code? guide for beginners%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:12:42 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%what is the universal product code? guide for beginners%'
OR article_user.user_email ILIKE '%what is the universal product code? guide for beginners%'
OR article_user.user_fname ILIKE '%what is the universal product code? guide for beginners%'
OR article_user.user_lname ILIKE '%what is the universal product code? guide for beginners%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:25:07 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 113
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:37:22 --> 404 Page Not Found: Assets/vendor
ERROR - 2021-02-19 22:37:32 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:37:54 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%omnichannel strategy%'
OR article_user.user_email ILIKE '%omnichannel strategy%'
OR article_user.user_fname ILIKE '%omnichannel strategy%'
OR article_user.user_lname ILIKE '%omnichannel strategy%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:37:54 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%omnichannel strategy%'
OR article_user.user_email ILIKE '%omnichannel strategy%'
OR article_user.user_fname ILIKE '%omnichannel strategy%'
OR article_user.user_lname ILIKE '%omnichannel strategy%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:37:56 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%omnichannel strategy%'
OR article_user.user_email ILIKE '%omnichannel strategy%'
OR article_user.user_fname ILIKE '%omnichannel strategy%'
OR article_user.user_lname ILIKE '%omnichannel strategy%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:38:03 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%gr%'
OR article_user.user_email ILIKE '%gr%'
OR article_user.user_fname ILIKE '%gr%'
OR article_user.user_lname ILIKE '%gr%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:38:03 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%gr%'
OR article_user.user_email ILIKE '%gr%'
OR article_user.user_fname ILIKE '%gr%'
OR article_user.user_lname ILIKE '%gr%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:38:03 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%gro%'
OR article_user.user_email ILIKE '%gro%'
OR article_user.user_fname ILIKE '%gro%'
OR article_user.user_lname ILIKE '%gro%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:38:03 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%grow%'
OR article_user.user_email ILIKE '%grow%'
OR article_user.user_fname ILIKE '%grow%'
OR article_user.user_lname ILIKE '%grow%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:38:05 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%grow%'
OR article_user.user_email ILIKE '%grow%'
OR article_user.user_fname ILIKE '%grow%'
OR article_user.user_lname ILIKE '%grow%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:38:13 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%how to increase profit margin%'
OR article_user.user_email ILIKE '%how to increase profit margin%'
OR article_user.user_fname ILIKE '%how to increase profit margin%'
OR article_user.user_lname ILIKE '%how to increase profit margin%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:38:13 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%how to increase profit margin%'
OR article_user.user_email ILIKE '%how to increase profit margin%'
OR article_user.user_fname ILIKE '%how to increase profit margin%'
OR article_user.user_lname ILIKE '%how to increase profit margin%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:38:15 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%how to increase profit margin%'
OR article_user.user_email ILIKE '%how to increase profit margin%'
OR article_user.user_fname ILIKE '%how to increase profit margin%'
OR article_user.user_lname ILIKE '%how to increase profit margin%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:38:23 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%ecommerce inventory management%'
OR article_user.user_email ILIKE '%ecommerce inventory management%'
OR article_user.user_fname ILIKE '%ecommerce inventory management%'
OR article_user.user_lname ILIKE '%ecommerce inventory management%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:38:23 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%ecommerce inventory management%'
OR article_user.user_email ILIKE '%ecommerce inventory management%'
OR article_user.user_fname ILIKE '%ecommerce inventory management%'
OR article_user.user_lname ILIKE '%ecommerce inventory management%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:38:28 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%ecommerce inventory%'
OR article_user.user_email ILIKE '%ecommerce inventory%'
OR article_user.user_fname ILIKE '%ecommerce inventory%'
OR article_user.user_lname ILIKE '%ecommerce inventory%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:38:32 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%ecommerce%'
OR article_user.user_email ILIKE '%ecommerce%'
OR article_user.user_fname ILIKE '%ecommerce%'
OR article_user.user_lname ILIKE '%ecommerce%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:38:39 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%ecommerce%'
OR article_user.user_email ILIKE '%ecommerce%'
OR article_user.user_fname ILIKE '%ecommerce%'
OR article_user.user_lname ILIKE '%ecommerce%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:38:48 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%e-commerce inventory management terms and methods for retailers%'
OR article_user.user_email ILIKE '%e-commerce inventory management terms and methods for retailers%'
OR article_user.user_fname ILIKE '%e-commerce inventory management terms and methods for retailers%'
OR article_user.user_lname ILIKE '%e-commerce inventory management terms and methods for retailers%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:38:48 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%e-commerce inventory management terms and methods for retailers%'
OR article_user.user_email ILIKE '%e-commerce inventory management terms and methods for retailers%'
OR article_user.user_fname ILIKE '%e-commerce inventory management terms and methods for retailers%'
OR article_user.user_lname ILIKE '%e-commerce inventory management terms and methods for retailers%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:38:56 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%inventory management terms and methods for retailers%'
OR article_user.user_email ILIKE '%inventory management terms and methods for retailers%'
OR article_user.user_fname ILIKE '%inventory management terms and methods for retailers%'
OR article_user.user_lname ILIKE '%inventory management terms and methods for retailers%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:39:05 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%management terms and methods for retailers%'
OR article_user.user_email ILIKE '%management terms and methods for retailers%'
OR article_user.user_fname ILIKE '%management terms and methods for retailers%'
OR article_user.user_lname ILIKE '%management terms and methods for retailers%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:39:12 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%management terms and methods for retailers%'
OR article_user.user_email ILIKE '%management terms and methods for retailers%'
OR article_user.user_fname ILIKE '%management terms and methods for retailers%'
OR article_user.user_lname ILIKE '%management terms and methods for retailers%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:39:12 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:39:13 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%e%'
OR article_user.user_email ILIKE '%e%'
OR article_user.user_fname ILIKE '%e%'
OR article_user.user_lname ILIKE '%e%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:39:13 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%e%'
OR article_user.user_email ILIKE '%e%'
OR article_user.user_fname ILIKE '%e%'
OR article_user.user_lname ILIKE '%e%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:39:14 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%e-%'
OR article_user.user_email ILIKE '%e-%'
OR article_user.user_fname ILIKE '%e-%'
OR article_user.user_lname ILIKE '%e-%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:39:14 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%e-co%'
OR article_user.user_email ILIKE '%e-co%'
OR article_user.user_fname ILIKE '%e-co%'
OR article_user.user_lname ILIKE '%e-co%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:39:14 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%e-com%'
OR article_user.user_email ILIKE '%e-com%'
OR article_user.user_fname ILIKE '%e-com%'
OR article_user.user_lname ILIKE '%e-com%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:39:14 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%e-com%'
OR article_user.user_email ILIKE '%e-com%'
OR article_user.user_fname ILIKE '%e-com%'
OR article_user.user_lname ILIKE '%e-com%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:39:14 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%e-comme%'
OR article_user.user_email ILIKE '%e-comme%'
OR article_user.user_fname ILIKE '%e-comme%'
OR article_user.user_lname ILIKE '%e-comme%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:39:15 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%e-commer%'
OR article_user.user_email ILIKE '%e-commer%'
OR article_user.user_fname ILIKE '%e-commer%'
OR article_user.user_lname ILIKE '%e-commer%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:39:15 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%e-commer%'
OR article_user.user_email ILIKE '%e-commer%'
OR article_user.user_fname ILIKE '%e-commer%'
OR article_user.user_lname ILIKE '%e-commer%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:39:15 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%e-commerce%'
OR article_user.user_email ILIKE '%e-commerce%'
OR article_user.user_fname ILIKE '%e-commerce%'
OR article_user.user_lname ILIKE '%e-commerce%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:39:15 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%e-commerce%'
OR article_user.user_email ILIKE '%e-commerce%'
OR article_user.user_fname ILIKE '%e-commerce%'
OR article_user.user_lname ILIKE '%e-commerce%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:39:20 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%e-commerce%'
OR article_user.user_email ILIKE '%e-commerce%'
OR article_user.user_fname ILIKE '%e-commerce%'
OR article_user.user_lname ILIKE '%e-commerce%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:40:10 --> 404 Page Not Found: Assets/vendor
ERROR - 2021-02-19 22:40:22 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:40:23 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%what is a buyer persona%'
OR article_user.user_email ILIKE '%what is a buyer persona%'
OR article_user.user_fname ILIKE '%what is a buyer persona%'
OR article_user.user_lname ILIKE '%what is a buyer persona%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:40:23 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%what is a buyer persona%'
OR article_user.user_email ILIKE '%what is a buyer persona%'
OR article_user.user_fname ILIKE '%what is a buyer persona%'
OR article_user.user_lname ILIKE '%what is a buyer persona%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:40:26 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%what is a buyer persona%'
OR article_user.user_email ILIKE '%what is a buyer persona%'
OR article_user.user_fname ILIKE '%what is a buyer persona%'
OR article_user.user_lname ILIKE '%what is a buyer persona%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:40:36 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%social media shopping%'
OR article_user.user_email ILIKE '%social media shopping%'
OR article_user.user_fname ILIKE '%social media shopping%'
OR article_user.user_lname ILIKE '%social media shopping%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:40:37 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%social media shopping%'
OR article_user.user_email ILIKE '%social media shopping%'
OR article_user.user_fname ILIKE '%social media shopping%'
OR article_user.user_lname ILIKE '%social media shopping%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:40:38 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%social media shopping%'
OR article_user.user_email ILIKE '%social media shopping%'
OR article_user.user_fname ILIKE '%social media shopping%'
OR article_user.user_lname ILIKE '%social media shopping%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:40:47 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%product positioning definition%'
OR article_user.user_email ILIKE '%product positioning definition%'
OR article_user.user_fname ILIKE '%product positioning definition%'
OR article_user.user_lname ILIKE '%product positioning definition%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:40:47 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%product positioning definition%'
OR article_user.user_email ILIKE '%product positioning definition%'
OR article_user.user_fname ILIKE '%product positioning definition%'
OR article_user.user_lname ILIKE '%product positioning definition%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:40:48 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%product positioning definition%'
OR article_user.user_email ILIKE '%product positioning definition%'
OR article_user.user_fname ILIKE '%product positioning definition%'
OR article_user.user_lname ILIKE '%product positioning definition%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:40:48 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 113
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:40:57 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%sku number%'
OR article_user.user_email ILIKE '%sku number%'
OR article_user.user_fname ILIKE '%sku number%'
OR article_user.user_lname ILIKE '%sku number%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:40:57 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%sku number%'
OR article_user.user_email ILIKE '%sku number%'
OR article_user.user_fname ILIKE '%sku number%'
OR article_user.user_lname ILIKE '%sku number%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:40:58 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%sku number%'
OR article_user.user_email ILIKE '%sku number%'
OR article_user.user_fname ILIKE '%sku number%'
OR article_user.user_lname ILIKE '%sku number%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:41:06 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%supply chain data analytics%'
OR article_user.user_email ILIKE '%supply chain data analytics%'
OR article_user.user_fname ILIKE '%supply chain data analytics%'
OR article_user.user_lname ILIKE '%supply chain data analytics%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:41:06 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%supply chain data analytics%'
OR article_user.user_email ILIKE '%supply chain data analytics%'
OR article_user.user_fname ILIKE '%supply chain data analytics%'
OR article_user.user_lname ILIKE '%supply chain data analytics%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:41:07 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%supply chain data analytics%'
OR article_user.user_email ILIKE '%supply chain data analytics%'
OR article_user.user_fname ILIKE '%supply chain data analytics%'
OR article_user.user_lname ILIKE '%supply chain data analytics%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:41:15 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%sku proliferation%'
OR article_user.user_email ILIKE '%sku proliferation%'
OR article_user.user_fname ILIKE '%sku proliferation%'
OR article_user.user_lname ILIKE '%sku proliferation%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:41:15 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%sku proliferation%'
OR article_user.user_email ILIKE '%sku proliferation%'
OR article_user.user_fname ILIKE '%sku proliferation%'
OR article_user.user_lname ILIKE '%sku proliferation%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:41:16 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%sku proliferation%'
OR article_user.user_email ILIKE '%sku proliferation%'
OR article_user.user_fname ILIKE '%sku proliferation%'
OR article_user.user_lname ILIKE '%sku proliferation%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:41:23 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%what is universal product code%'
OR article_user.user_email ILIKE '%what is universal product code%'
OR article_user.user_fname ILIKE '%what is universal product code%'
OR article_user.user_lname ILIKE '%what is universal product code%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:41:23 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%what is universal product code%'
OR article_user.user_email ILIKE '%what is universal product code%'
OR article_user.user_fname ILIKE '%what is universal product code%'
OR article_user.user_lname ILIKE '%what is universal product code%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:41:26 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%what is universal code%'
OR article_user.user_email ILIKE '%what is universal code%'
OR article_user.user_fname ILIKE '%what is universal code%'
OR article_user.user_lname ILIKE '%what is universal code%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:41:28 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%what is universal%'
OR article_user.user_email ILIKE '%what is universal%'
OR article_user.user_fname ILIKE '%what is universal%'
OR article_user.user_lname ILIKE '%what is universal%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:41:32 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%what is universal%'
OR article_user.user_email ILIKE '%what is universal%'
OR article_user.user_fname ILIKE '%what is universal%'
OR article_user.user_lname ILIKE '%what is universal%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:41:38 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%what is thuniversal%'
OR article_user.user_email ILIKE '%what is thuniversal%'
OR article_user.user_fname ILIKE '%what is thuniversal%'
OR article_user.user_lname ILIKE '%what is thuniversal%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:41:38 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%what is thuniversal%'
OR article_user.user_email ILIKE '%what is thuniversal%'
OR article_user.user_fname ILIKE '%what is thuniversal%'
OR article_user.user_lname ILIKE '%what is thuniversal%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:41:39 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%what is the universal%'
OR article_user.user_email ILIKE '%what is the universal%'
OR article_user.user_fname ILIKE '%what is the universal%'
OR article_user.user_lname ILIKE '%what is the universal%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:41:39 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%what is the universal%'
OR article_user.user_email ILIKE '%what is the universal%'
OR article_user.user_fname ILIKE '%what is the universal%'
OR article_user.user_lname ILIKE '%what is the universal%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:41:41 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%what is the universal%'
OR article_user.user_email ILIKE '%what is the universal%'
OR article_user.user_fname ILIKE '%what is the universal%'
OR article_user.user_lname ILIKE '%what is the universal%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:41:54 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%product recommendation%'
OR article_user.user_email ILIKE '%product recommendation%'
OR article_user.user_fname ILIKE '%product recommendation%'
OR article_user.user_lname ILIKE '%product recommendation%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:41:54 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%product recommendation%'
OR article_user.user_email ILIKE '%product recommendation%'
OR article_user.user_fname ILIKE '%product recommendation%'
OR article_user.user_lname ILIKE '%product recommendation%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:41:54 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 113
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:41:55 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%product recommendation%'
OR article_user.user_email ILIKE '%product recommendation%'
OR article_user.user_fname ILIKE '%product recommendation%'
OR article_user.user_lname ILIKE '%product recommendation%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:42:02 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%cloud based inventory management%'
OR article_user.user_email ILIKE '%cloud based inventory management%'
OR article_user.user_fname ILIKE '%cloud based inventory management%'
OR article_user.user_lname ILIKE '%cloud based inventory management%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:42:03 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%cloud based inventory management%'
OR article_user.user_email ILIKE '%cloud based inventory management%'
OR article_user.user_fname ILIKE '%cloud based inventory management%'
OR article_user.user_lname ILIKE '%cloud based inventory management%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:42:04 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%cloud-based inventory management%'
OR article_user.user_email ILIKE '%cloud-based inventory management%'
OR article_user.user_fname ILIKE '%cloud-based inventory management%'
OR article_user.user_lname ILIKE '%cloud-based inventory management%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:42:04 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%cloud-based inventory management%'
OR article_user.user_email ILIKE '%cloud-based inventory management%'
OR article_user.user_fname ILIKE '%cloud-based inventory management%'
OR article_user.user_lname ILIKE '%cloud-based inventory management%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:42:06 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%cloud-based inventory management%'
OR article_user.user_email ILIKE '%cloud-based inventory management%'
OR article_user.user_fname ILIKE '%cloud-based inventory management%'
OR article_user.user_lname ILIKE '%cloud-based inventory management%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:42:14 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%merchandising strategy%'
OR article_user.user_email ILIKE '%merchandising strategy%'
OR article_user.user_fname ILIKE '%merchandising strategy%'
OR article_user.user_lname ILIKE '%merchandising strategy%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:42:14 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%merchandising strategy%'
OR article_user.user_email ILIKE '%merchandising strategy%'
OR article_user.user_fname ILIKE '%merchandising strategy%'
OR article_user.user_lname ILIKE '%merchandising strategy%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:42:15 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%merchandising strateg%'
OR article_user.user_email ILIKE '%merchandising strateg%'
OR article_user.user_fname ILIKE '%merchandising strateg%'
OR article_user.user_lname ILIKE '%merchandising strateg%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:42:15 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%merchandising strategi%'
OR article_user.user_email ILIKE '%merchandising strategi%'
OR article_user.user_fname ILIKE '%merchandising strategi%'
OR article_user.user_lname ILIKE '%merchandising strategi%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:42:16 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%merchandising strategies%'
OR article_user.user_email ILIKE '%merchandising strategies%'
OR article_user.user_fname ILIKE '%merchandising strategies%'
OR article_user.user_lname ILIKE '%merchandising strategies%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:42:16 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%merchandising strategies%'
OR article_user.user_email ILIKE '%merchandising strategies%'
OR article_user.user_fname ILIKE '%merchandising strategies%'
OR article_user.user_lname ILIKE '%merchandising strategies%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:42:17 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%merchandising strategies%'
OR article_user.user_email ILIKE '%merchandising strategies%'
OR article_user.user_fname ILIKE '%merchandising strategies%'
OR article_user.user_lname ILIKE '%merchandising strategies%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:42:25 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%inventory counting methods%'
OR article_user.user_email ILIKE '%inventory counting methods%'
OR article_user.user_fname ILIKE '%inventory counting methods%'
OR article_user.user_lname ILIKE '%inventory counting methods%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:42:26 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%inventory counting methods%'
OR article_user.user_email ILIKE '%inventory counting methods%'
OR article_user.user_fname ILIKE '%inventory counting methods%'
OR article_user.user_lname ILIKE '%inventory counting methods%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:42:26 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%inventory counting methods%'
OR article_user.user_email ILIKE '%inventory counting methods%'
OR article_user.user_fname ILIKE '%inventory counting methods%'
OR article_user.user_lname ILIKE '%inventory counting methods%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:42:36 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%rfid inventory%'
OR article_user.user_email ILIKE '%rfid inventory%'
OR article_user.user_fname ILIKE '%rfid inventory%'
OR article_user.user_lname ILIKE '%rfid inventory%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:42:36 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%rfid inventory%'
OR article_user.user_email ILIKE '%rfid inventory%'
OR article_user.user_fname ILIKE '%rfid inventory%'
OR article_user.user_lname ILIKE '%rfid inventory%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:42:37 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%rfid inventory%'
OR article_user.user_email ILIKE '%rfid inventory%'
OR article_user.user_fname ILIKE '%rfid inventory%'
OR article_user.user_lname ILIKE '%rfid inventory%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:42:46 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%inventory organization%'
OR article_user.user_email ILIKE '%inventory organization%'
OR article_user.user_fname ILIKE '%inventory organization%'
OR article_user.user_lname ILIKE '%inventory organization%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:42:46 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%inventory organization%'
OR article_user.user_email ILIKE '%inventory organization%'
OR article_user.user_fname ILIKE '%inventory organization%'
OR article_user.user_lname ILIKE '%inventory organization%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:42:47 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%inventory organization%'
OR article_user.user_email ILIKE '%inventory organization%'
OR article_user.user_fname ILIKE '%inventory organization%'
OR article_user.user_lname ILIKE '%inventory organization%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:42:56 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%inventory process%'
OR article_user.user_email ILIKE '%inventory process%'
OR article_user.user_fname ILIKE '%inventory process%'
OR article_user.user_lname ILIKE '%inventory process%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:42:56 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%inventory process%'
OR article_user.user_email ILIKE '%inventory process%'
OR article_user.user_fname ILIKE '%inventory process%'
OR article_user.user_lname ILIKE '%inventory process%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:42:56 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%inventory process%'
OR article_user.user_email ILIKE '%inventory process%'
OR article_user.user_fname ILIKE '%inventory process%'
OR article_user.user_lname ILIKE '%inventory process%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:43:06 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%abc inventory%'
OR article_user.user_email ILIKE '%abc inventory%'
OR article_user.user_fname ILIKE '%abc inventory%'
OR article_user.user_lname ILIKE '%abc inventory%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:43:06 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%abc inventory%'
OR article_user.user_email ILIKE '%abc inventory%'
OR article_user.user_fname ILIKE '%abc inventory%'
OR article_user.user_lname ILIKE '%abc inventory%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:43:06 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%abc inventory%'
OR article_user.user_email ILIKE '%abc inventory%'
OR article_user.user_fname ILIKE '%abc inventory%'
OR article_user.user_lname ILIKE '%abc inventory%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:43:15 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%inventory shortage%'
OR article_user.user_email ILIKE '%inventory shortage%'
OR article_user.user_fname ILIKE '%inventory shortage%'
OR article_user.user_lname ILIKE '%inventory shortage%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:43:15 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%inventory shortage%'
OR article_user.user_email ILIKE '%inventory shortage%'
OR article_user.user_fname ILIKE '%inventory shortage%'
OR article_user.user_lname ILIKE '%inventory shortage%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:43:16 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%inventory shortage%'
OR article_user.user_email ILIKE '%inventory shortage%'
OR article_user.user_fname ILIKE '%inventory shortage%'
OR article_user.user_lname ILIKE '%inventory shortage%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:51:59 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 113
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:53:17 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%invoice processing%'
OR article_user.user_email ILIKE '%invoice processing%'
OR article_user.user_fname ILIKE '%invoice processing%'
OR article_user.user_lname ILIKE '%invoice processing%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:53:17 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%invoice processing%'
OR article_user.user_email ILIKE '%invoice processing%'
OR article_user.user_fname ILIKE '%invoice processing%'
OR article_user.user_lname ILIKE '%invoice processing%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:53:19 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%invoice processing%'
OR article_user.user_email ILIKE '%invoice processing%'
OR article_user.user_fname ILIKE '%invoice processing%'
OR article_user.user_lname ILIKE '%invoice processing%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:53:27 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%accounts payable and receivable%'
OR article_user.user_email ILIKE '%accounts payable and receivable%'
OR article_user.user_fname ILIKE '%accounts payable and receivable%'
OR article_user.user_lname ILIKE '%accounts payable and receivable%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:53:27 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%accounts payable and receivable%'
OR article_user.user_email ILIKE '%accounts payable and receivable%'
OR article_user.user_fname ILIKE '%accounts payable and receivable%'
OR article_user.user_lname ILIKE '%accounts payable and receivable%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:53:28 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%accounts payable and receivable%'
OR article_user.user_email ILIKE '%accounts payable and receivable%'
OR article_user.user_fname ILIKE '%accounts payable and receivable%'
OR article_user.user_lname ILIKE '%accounts payable and receivable%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:53:35 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%order fulfillment%'
OR article_user.user_email ILIKE '%order fulfillment%'
OR article_user.user_fname ILIKE '%order fulfillment%'
OR article_user.user_lname ILIKE '%order fulfillment%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:53:35 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%order fulfillment%'
OR article_user.user_email ILIKE '%order fulfillment%'
OR article_user.user_fname ILIKE '%order fulfillment%'
OR article_user.user_lname ILIKE '%order fulfillment%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:53:36 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%order fulfillment%'
OR article_user.user_email ILIKE '%order fulfillment%'
OR article_user.user_fname ILIKE '%order fulfillment%'
OR article_user.user_lname ILIKE '%order fulfillment%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:53:45 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%order fulfillment costs%'
OR article_user.user_email ILIKE '%order fulfillment costs%'
OR article_user.user_fname ILIKE '%order fulfillment costs%'
OR article_user.user_lname ILIKE '%order fulfillment costs%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:53:46 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%fulfillment costs%'
OR article_user.user_email ILIKE '%fulfillment costs%'
OR article_user.user_fname ILIKE '%fulfillment costs%'
OR article_user.user_lname ILIKE '%fulfillment costs%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:53:46 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%fulfillment costs%'
OR article_user.user_email ILIKE '%fulfillment costs%'
OR article_user.user_fname ILIKE '%fulfillment costs%'
OR article_user.user_lname ILIKE '%fulfillment costs%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:53:47 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%fulfillment costs%'
OR article_user.user_email ILIKE '%fulfillment costs%'
OR article_user.user_fname ILIKE '%fulfillment costs%'
OR article_user.user_lname ILIKE '%fulfillment costs%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:53:54 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%dropshipping explained%'
OR article_user.user_email ILIKE '%dropshipping explained%'
OR article_user.user_fname ILIKE '%dropshipping explained%'
OR article_user.user_lname ILIKE '%dropshipping explained%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:53:54 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%dropshipping explained%'
OR article_user.user_email ILIKE '%dropshipping explained%'
OR article_user.user_fname ILIKE '%dropshipping explained%'
OR article_user.user_lname ILIKE '%dropshipping explained%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:53:55 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%dropshipping explained%'
OR article_user.user_email ILIKE '%dropshipping explained%'
OR article_user.user_fname ILIKE '%dropshipping explained%'
OR article_user.user_lname ILIKE '%dropshipping explained%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:54:03 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%lead time reduction%'
OR article_user.user_email ILIKE '%lead time reduction%'
OR article_user.user_fname ILIKE '%lead time reduction%'
OR article_user.user_lname ILIKE '%lead time reduction%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:54:03 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%lead time reduction%'
OR article_user.user_email ILIKE '%lead time reduction%'
OR article_user.user_fname ILIKE '%lead time reduction%'
OR article_user.user_lname ILIKE '%lead time reduction%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:54:04 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%lead time reduction%'
OR article_user.user_email ILIKE '%lead time reduction%'
OR article_user.user_fname ILIKE '%lead time reduction%'
OR article_user.user_lname ILIKE '%lead time reduction%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:54:22 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%customer returns%'
OR article_user.user_email ILIKE '%customer returns%'
OR article_user.user_fname ILIKE '%customer returns%'
OR article_user.user_lname ILIKE '%customer returns%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:54:22 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%customer returns%'
OR article_user.user_email ILIKE '%customer returns%'
OR article_user.user_fname ILIKE '%customer returns%'
OR article_user.user_lname ILIKE '%customer returns%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:54:23 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%customer returns%'
OR article_user.user_email ILIKE '%customer returns%'
OR article_user.user_fname ILIKE '%customer returns%'
OR article_user.user_lname ILIKE '%customer returns%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:54:33 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%shipping costs for small business%'
OR article_user.user_email ILIKE '%shipping costs for small business%'
OR article_user.user_fname ILIKE '%shipping costs for small business%'
OR article_user.user_lname ILIKE '%shipping costs for small business%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:54:33 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%shipping costs for small business%'
OR article_user.user_email ILIKE '%shipping costs for small business%'
OR article_user.user_fname ILIKE '%shipping costs for small business%'
OR article_user.user_lname ILIKE '%shipping costs for small business%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:54:36 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%shipping costs for small business%'
OR article_user.user_email ILIKE '%shipping costs for small business%'
OR article_user.user_fname ILIKE '%shipping costs for small business%'
OR article_user.user_lname ILIKE '%shipping costs for small business%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:54:40 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%reorder point formula%'
OR article_user.user_email ILIKE '%reorder point formula%'
OR article_user.user_fname ILIKE '%reorder point formula%'
OR article_user.user_lname ILIKE '%reorder point formula%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:54:41 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%reorder point formula%'
OR article_user.user_email ILIKE '%reorder point formula%'
OR article_user.user_fname ILIKE '%reorder point formula%'
OR article_user.user_lname ILIKE '%reorder point formula%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:54:41 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%reorder point formula%'
OR article_user.user_email ILIKE '%reorder point formula%'
OR article_user.user_fname ILIKE '%reorder point formula%'
OR article_user.user_lname ILIKE '%reorder point formula%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:54:50 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%inventory adjustment%'
OR article_user.user_email ILIKE '%inventory adjustment%'
OR article_user.user_fname ILIKE '%inventory adjustment%'
OR article_user.user_lname ILIKE '%inventory adjustment%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:54:50 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%inventory adjustment%'
OR article_user.user_email ILIKE '%inventory adjustment%'
OR article_user.user_fname ILIKE '%inventory adjustment%'
OR article_user.user_lname ILIKE '%inventory adjustment%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:54:50 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%inventory adjustment%'
OR article_user.user_email ILIKE '%inventory adjustment%'
OR article_user.user_fname ILIKE '%inventory adjustment%'
OR article_user.user_lname ILIKE '%inventory adjustment%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:54:59 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%inventory carrying cost formula%'
OR article_user.user_email ILIKE '%inventory carrying cost formula%'
OR article_user.user_fname ILIKE '%inventory carrying cost formula%'
OR article_user.user_lname ILIKE '%inventory carrying cost formula%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:54:59 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%inventory carrying cost formula%'
OR article_user.user_email ILIKE '%inventory carrying cost formula%'
OR article_user.user_fname ILIKE '%inventory carrying cost formula%'
OR article_user.user_lname ILIKE '%inventory carrying cost formula%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:55:00 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%inventory carrying cost formula%'
OR article_user.user_email ILIKE '%inventory carrying cost formula%'
OR article_user.user_fname ILIKE '%inventory carrying cost formula%'
OR article_user.user_lname ILIKE '%inventory carrying cost formula%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:55:05 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 113
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:55:07 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%restaurant organization%'
OR article_user.user_email ILIKE '%restaurant organization%'
OR article_user.user_fname ILIKE '%restaurant organization%'
OR article_user.user_lname ILIKE '%restaurant organization%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:55:08 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%restaurant organization%'
OR article_user.user_email ILIKE '%restaurant organization%'
OR article_user.user_fname ILIKE '%restaurant organization%'
OR article_user.user_lname ILIKE '%restaurant organization%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:55:08 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%restaurant organization%'
OR article_user.user_email ILIKE '%restaurant organization%'
OR article_user.user_fname ILIKE '%restaurant organization%'
OR article_user.user_lname ILIKE '%restaurant organization%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:55:15 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%inventory aging%'
OR article_user.user_email ILIKE '%inventory aging%'
OR article_user.user_fname ILIKE '%inventory aging%'
OR article_user.user_lname ILIKE '%inventory aging%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:55:16 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%inventory aging%'
OR article_user.user_email ILIKE '%inventory aging%'
OR article_user.user_fname ILIKE '%inventory aging%'
OR article_user.user_lname ILIKE '%inventory aging%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 22:55:16 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%inventory aging%'
OR article_user.user_email ILIKE '%inventory aging%'
OR article_user.user_fname ILIKE '%inventory aging%'
OR article_user.user_lname ILIKE '%inventory aging%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 23:03:21 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 113
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 23:03:28 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 113
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 23:03:39 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 113
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 23:04:30 --> 404 Page Not Found: Assets/vendor
ERROR - 2021-02-19 23:04:35 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 23:04:39 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 113
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 23:04:39 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%accurate inventory tracking methods %'
OR article_user.user_email ILIKE '%accurate inventory tracking methods %'
OR article_user.user_fname ILIKE '%accurate inventory tracking methods %'
OR article_user.user_lname ILIKE '%accurate inventory tracking methods %'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 23:04:40 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%accurate inventory tracking methods %'
OR article_user.user_email ILIKE '%accurate inventory tracking methods %'
OR article_user.user_fname ILIKE '%accurate inventory tracking methods %'
OR article_user.user_lname ILIKE '%accurate inventory tracking methods %'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 23:04:41 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%accurate inventory tracking methods %'
OR article_user.user_email ILIKE '%accurate inventory tracking methods %'
OR article_user.user_fname ILIKE '%accurate inventory tracking methods %'
OR article_user.user_lname ILIKE '%accurate inventory tracking methods %'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 23:04:49 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%how to cycle count %'
OR article_user.user_email ILIKE '%how to cycle count %'
OR article_user.user_fname ILIKE '%how to cycle count %'
OR article_user.user_lname ILIKE '%how to cycle count %'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 23:04:49 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%how to cycle count %'
OR article_user.user_email ILIKE '%how to cycle count %'
OR article_user.user_fname ILIKE '%how to cycle count %'
OR article_user.user_lname ILIKE '%how to cycle count %'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 23:04:50 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%how to cycle count %'
OR article_user.user_email ILIKE '%how to cycle count %'
OR article_user.user_fname ILIKE '%how to cycle count %'
OR article_user.user_lname ILIKE '%how to cycle count %'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 23:05:00 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%ultimate guide to retail %'
OR article_user.user_email ILIKE '%ultimate guide to retail %'
OR article_user.user_fname ILIKE '%ultimate guide to retail %'
OR article_user.user_lname ILIKE '%ultimate guide to retail %'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 23:05:00 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%ultimate guide to retail %'
OR article_user.user_email ILIKE '%ultimate guide to retail %'
OR article_user.user_fname ILIKE '%ultimate guide to retail %'
OR article_user.user_lname ILIKE '%ultimate guide to retail %'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 23:05:01 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%ultimate guide to retail %'
OR article_user.user_email ILIKE '%ultimate guide to retail %'
OR article_user.user_fname ILIKE '%ultimate guide to retail %'
OR article_user.user_lname ILIKE '%ultimate guide to retail %'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 23:05:12 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%guide to product portfolio %'
OR article_user.user_email ILIKE '%guide to product portfolio %'
OR article_user.user_fname ILIKE '%guide to product portfolio %'
OR article_user.user_lname ILIKE '%guide to product portfolio %'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 23:05:12 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%guide to product portfolio %'
OR article_user.user_email ILIKE '%guide to product portfolio %'
OR article_user.user_fname ILIKE '%guide to product portfolio %'
OR article_user.user_lname ILIKE '%guide to product portfolio %'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 23:05:19 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%guide to product portfolio %'
OR article_user.user_email ILIKE '%guide to product portfolio %'
OR article_user.user_fname ILIKE '%guide to product portfolio %'
OR article_user.user_lname ILIKE '%guide to product portfolio %'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 23:05:32 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%complete guide to omnichannel %'
OR article_user.user_email ILIKE '%complete guide to omnichannel %'
OR article_user.user_fname ILIKE '%complete guide to omnichannel %'
OR article_user.user_lname ILIKE '%complete guide to omnichannel %'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 23:05:32 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%complete guide to omnichannel %'
OR article_user.user_email ILIKE '%complete guide to omnichannel %'
OR article_user.user_fname ILIKE '%complete guide to omnichannel %'
OR article_user.user_lname ILIKE '%complete guide to omnichannel %'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 23:05:33 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%complete guide to omnichannel %'
OR article_user.user_email ILIKE '%complete guide to omnichannel %'
OR article_user.user_fname ILIKE '%complete guide to omnichannel %'
OR article_user.user_lname ILIKE '%complete guide to omnichannel %'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 23:05:53 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%product portfolio %'
OR article_user.user_email ILIKE '%product portfolio %'
OR article_user.user_fname ILIKE '%product portfolio %'
OR article_user.user_lname ILIKE '%product portfolio %'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 23:05:53 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%product portfolio %'
OR article_user.user_email ILIKE '%product portfolio %'
OR article_user.user_fname ILIKE '%product portfolio %'
OR article_user.user_lname ILIKE '%product portfolio %'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 23:05:54 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%product portfolio %'
OR article_user.user_email ILIKE '%product portfolio %'
OR article_user.user_fname ILIKE '%product portfolio %'
OR article_user.user_lname ILIKE '%product portfolio %'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 23:12:09 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 113
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 23:13:36 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 113
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 23:37:09 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 124
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 23:41:50 --> 404 Page Not Found: Faviconico/index
ERROR - 2021-02-19 23:55:13 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 111
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-19 23:58:00 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 124
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
