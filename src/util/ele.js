import { Aside, Avatar, Button, Container, Dialog, Footer, Form, FormItem, Header, Input, Link, Main, Menu, MenuItem, MenuItemGroup, Message, MessageBox, Option, Pagination, Popconfirm, Select, Submenu, Table, TableColumn, Upload } from 'element-ui';
import Vue from 'vue';

[Button, Input, Form, FormItem,
  Container, Aside, Header, Footer,
  Main, Menu, MenuItem, MenuItemGroup,
  Submenu, Table, TableColumn, Pagination, Dialog,
  Upload, Popconfirm, Select, Option,Link,
  Avatar
].forEach(item => {
    Vue.use(item)
  })
// Vue.use(Button)


Vue.prototype.$msgbox = MessageBox;
Vue.prototype.$alert = MessageBox.alert;
Vue.prototype.$confirm = MessageBox.confirm;
Vue.prototype.$prompt = MessageBox.prompt;
Vue.prototype.$message = Message;