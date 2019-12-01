/*
 * Authors: Shayna Jamieson
 * 2019-11-30
 * Version 1.0
 * File name: create_tables.sql

 This file serves to hold the queries that will run to create
 the guest book query every time and other related sql code.
 */

CREATE TABLE User(
    user_id          INT          NOT NULL AUTO_INCREMENT,
    user_title		 VARCHAR(255) NULL,
    user_first       VARCHAR(255) NULL,
    user_last        VARCHAR(255) NULL,
    user_company     VARCHAR(255) NULL,
    user_linked_in   VARCHAR(255) NULL,
    user_email       VARCHAR(255) NULL,
    user_email_format VARCHAR(255) NULL,
    user_mailing     VARCHAR(255) NULL,
    user_comment     VARCHAR(255) NULL,
    user_how_we_met  VARCHAR(255) NULL,
    user_date_joined DATETIME     NULL,
    PRIMARY KEY (user_id)
);