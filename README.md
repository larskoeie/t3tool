t3tool is a command line tool for administering a TYPO3 installation.

It allows you to list, show details of and modify backend users, domain records and other things.

Full command list :

  
```
#!php


  t3tool alldomains enable [except <domain or uid>]
    Enable all domains.
  t3tool alldomains disable [except <domain or uid>]
    Disable all domains.

  t3tool allusers enable [except <username, email or uid>]
    Enable all users.
  t3tool allusers disable [except <username, email or uid>]
    Disable all users.
  t3tool allusers removeemail [except <username, email or uid>]
    Remove all backend users emails.

  t3tool domain list
  t3tool domain dns
    Search for a DNS A-record for each domain, and list the IPs.
  t3tool domain check
    Create a unique file and retrieve it through that domain, list the result.
  t3tool domain dnsandcheck
    The two above, combined.
  t3tool domain show <domain name>
  t3tool domain add <domain name> <pid>
  t3tool domain enable <domain name or uid>
  t3tool domain movetotop <domain name or uid>
  t3tool domain disable <domain name or uid>
  t3tool domain delete <domain name or uid>

  t3tool ext list
  t3tool show <ext>
  t3tool ext config <extkey>
  t3tool ext dependencies

  t3tool search <table> <string>

  t3tool user list [<username, email or uid>]
    List all users.
  t3tool user show <username, email or uid>
    Show details of single user.
  t3tool user enable <username, email or uid>
    Enable single user.
  t3tool user disable <username, email or uid>
    Disable single user.
  t3tool user delete <username, email or uid>
    Delete single user. NO going back !
  t3tool user setadmin <username, email or uid>
    Make user admin.
  t3tool user clradmin <username, email or uid>
    Make user non-admin.
  t3tool user groups [<title>]
    List all user groups or filtered by title.
  t3tool user showgroup [<title>]
    Show user groups with all fields.
  t3tool user addgroup <username, email or uid> <group uid or title>
    Add group to user.
  t3tool user rmgroup <username, email or uid> <group uid or title>
    Remove group from user.
  t3tool user password <username, email or uid>
    Set users password (passwrord will be prompted).
  t3tool user create <username, email or uid>
    Create admin user (password will be prompted).

```
