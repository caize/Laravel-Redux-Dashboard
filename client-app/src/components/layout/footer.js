import React from 'react'
import styles from './layout.less'
import  config  from '../../config/site'

const Footer = () => {
  <div className={styles.footer}>
    {config.footerText}
  </div>
}
export default Footer;
