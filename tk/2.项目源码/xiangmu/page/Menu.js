import React,{Component} from 'react';
import {
    AppRegistry,
    StyleSheet,
    Dimensions,
    ScrollView,
    Text,
    Image,
    View,
	 Alert,
  ToastAndroid,
} from 'react-native'
const window = Dimensions.get('window');
import {Navigator} from 'react-native-deprecated-custom-components';
import denglu from './denglu';
import Mainpage from './Mainpage';
import NetUtil from './NetUtil';
export default class Menu extends Component{
  constructor(props){
	  super(props);
	  this.state={
    		userid:'',
    		username:'',
    	};
  };  
   componentWillMount(){
  	storage.load({
    key: 'loginStatus',
    autoSync: true,
    syncInBackground: true,
    syncParams: {
	extraFetchOptions: {
	},
	someFlag: true,
    },
		  }).then(ret => {
				 this.setState({
				 	userid:ret.userid,
				 	username:ret.username
				 });
		  }).catch(err => {
		  })
  }
    static propTypes = {
        onItemSelected: React.PropTypes.func.isRequired,
    };// 注意这里有分号
    render(){
        return(
    <View style={styles.zuida}>
			  <View style={styles.tou} >
	  			<Text style={styles.mingzi}>{this.state.username}</Text>
      	</View>
    </View>
      );
    }
}
const styles = StyleSheet.create({
  zuida:{
    width:'100%',
    height:'100%',
  },
  mingzi: {
	  marginTop:105,
	  marginLeft:20,
	fontSize:20,
	color:'#000',
  },
  tou:{
	  width:350,
	  flexDirection:'row', 	
  },
});