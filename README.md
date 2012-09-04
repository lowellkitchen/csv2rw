csv2rw
======

A simple script for converting a CSV of URLs into Apache rewrite rules.

Usage: php csv2rw.php path_to_csv_file

The csv file is expected to be in the following format:

/old_relative_url, /new_relative_url

Old URLs with query string parameters will be turned into conditional rewrites using the RewriteCond directive.

Use at your own risk!  This tool may *potentially* create invalid rewrite rules.