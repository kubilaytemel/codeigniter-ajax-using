# Codeigniter Ajax Using

## Database Table  
```
DROP TABLE IF EXISTS `megamenu`;
CREATE TABLE IF NOT EXISTS `megamenu` (
  `megamenu_id` int(11) NOT NULL AUTO_INCREMENT,
  `megamenu_name` varchar(100) NOT NULL,
  `megamenu_html` text NOT NULL,
  `megamenu_cat` int(11) NOT NULL,
  `megamenu_page` int(11) NOT NULL,
  `megamenu_statu` int(1) NOT NULL,
  `megamenu_number` int(11) NOT NULL,
  `megamenu_type` varchar(15) NOT NULL,
  `megamenu_parent` int(11) NOT NULL,
  PRIMARY KEY (`megamenu_id`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

```
