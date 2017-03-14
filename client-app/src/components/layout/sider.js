import React, { Component ,PropTypes} from 'react';
import { createStyleSheet } from 'jss-theme-reactor';
import customPropTypes from 'material-ui/utils/customPropTypes';
import Drawer from 'material-ui/Drawer';
import {
  List,
  ListItem,
  ListItemText,
  ListItemIcon,
} from 'material-ui/List';
import Divider from 'material-ui/Divider';
import InboxIcon from 'material-ui/svg-icons/inbox';
import DraftsIcon from 'material-ui/svg-icons/drafts';
import StarIcon from 'material-ui/svg-icons/star';
import SendIcon from 'material-ui/svg-icons/send';
import MailIcon from 'material-ui/svg-icons/mail';
import DeleteIcon from 'material-ui/svg-icons/delete';
import ReportIcon from 'material-ui/svg-icons/report';


const styleSheet = createStyleSheet('Sider', () => ({
  list: {
    width: 250,
    flex: 'initial',
  },
  remainder: {
    flex: 1,
  },
}));

export default class Sider extends Component {
  render() {
    const classes = this.context.styleManager.render(styleSheet);
    const open=this.props.open
    const handleChange=this.props.handleChange
    return (
      <div>
        <Drawer
          open={open}
          onRequestClose={handleChange}
          onClick={handleChange}
        >
          <List className={classes.list} padding={false}>
            <ListItem button>
              <ListItemIcon>
                <InboxIcon />
              </ListItemIcon>
              <ListItemText primary="Inbox" />
            </ListItem>
            <ListItem button>
              <ListItemIcon>
                <StarIcon />
              </ListItemIcon>
              <ListItemText primary="Starred" />
            </ListItem>
            <ListItem button>
              <ListItemIcon>
                <SendIcon />
              </ListItemIcon>
              <ListItemText primary="Send mail" />
            </ListItem>
            <ListItem button>
              <ListItemIcon>
                <DraftsIcon />
              </ListItemIcon>
              <ListItemText primary="Drafts" />
            </ListItem>
          </List>
          <Divider />
          <List className={classes.list} padding={false}>
            <ListItem button>
              <ListItemIcon>
                <MailIcon />
              </ListItemIcon>
              <ListItemText primary="All mail" />
            </ListItem>
            <ListItem button>
              <ListItemIcon>
                <DeleteIcon />
              </ListItemIcon>
              <ListItemText primary="Trash" />
            </ListItem>
            <ListItem button>
              <ListItemIcon>
                <ReportIcon />
              </ListItemIcon>
              <ListItemText primary="Spam" />
            </ListItem>
          </List>
          <div className={classes.remainder} />
        </Drawer>
      </div>
    );
  }
}

Sider.contextTypes = {
  styleManager: customPropTypes.muiRequired,
};

Sider.propTypes = {
  handleChange: PropTypes.func.isRequired,
  open: PropTypes.bool.isRequired
}
