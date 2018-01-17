/**
 * Sample React Native App
 * https://github.com/facebook/react-native 注册
 * @flow
 */

import React, { Component } from 'react';
import {
  AppRegistry,
  StyleSheet,
  Text,
  View,
  TextInput,
  Button,
  TouchableHighlight,
  ToastAndroid,
   Image,
   ScrollView,
   ListView,
 TouchableOpacity
} from 'react-native';
import {Navigator} from 'react-native-deprecated-custom-components';
import shouye from './shouye';
import NetUtil from './NetUtil';
import {PullList} from 'react-native-pull';	 //下拉刷新	
export default class zhuce extends Component {
	constructor(props){
		super(props);
		this.state=({
			userid:'',
			dataSource:new ListView.DataSource({rowHasChanged: (r1, r2) => r1 !== r2})
		});
	}
	componentWillMount(){
		//读取userid
		  storage.load({
		    key: 'loginStatus',
		    autoSync: false,
		    syncInBackground: false,
		  }).then(ret => {
		  	this.setState({
		  		userid:ret.userid,
		  	});
		  }).catch(err => { 
		  	alert('尚未登陆'); 
		  });


  storage.load({
  key: 'lawlist',
  autoSync: true,
  syncInBackground: true,
  syncParams: {
	extraFetchOptions: {
	},
	someFlag: true,
    },
  }).then(ret => {
	  let _this=this;
			_this.setState({
			dataSource:_this.state.dataSource.cloneWithRows(ret.lawlist),
		 }); 	
  }).catch(err => {
  		let _this=this;
		let url="http://www.hilyy.cn/index.php/tiku/Xiangmu/chengji";
		let params='crrage=1&userid='+this.state.userid;
		NetUtil.postForm(url,params,function(result){
			_this.setState({
				dataSource:_this.state.dataSource.cloneWithRows(result),
			});
			// storage.save({
			// 	key: 'lawlist',
			// 	data: { 
			// 	lawdata:result,
			// },
			// 	expires: null,
			// });
		});
	})
}
	topIndicatorRender(pulling, pullok, pullrelease) {
        const hide = {position: 'absolute', left: -10000};
        const show = {position: 'relative', left: 0};
		return (
            <View style={{flexDirection: 'row', justifyContent: 'center', alignItems: 'center', height: 60}}>
                <ActivityIndicator size="small" color="gray" />
                <Text ref={(c) => {this.txtPulling = c;}}>下拉刷新...</Text>
                <Text ref={(c) => {this.txtPullok = c;}}>松开刷新...</Text>
                <Text ref={(c) => {this.txtPullrelease = c;}}>玩命刷新中...</Text>
    		</View>
        );
	}

shouye=()=>{
   this.props.navigator.push({
     name:'shouye',
    component:shouye
   });
  }
xieyi=()=>{
   this.props.navigator.push({
     name:'xieyi',
    component:xieyi
   });
  }
shouye=()=>{
   this.props.navigator.push({
     name:'shouye',
    component:shouye,
    params:{
      userid:this.state.userid
    }
   });
  }
  
onPullRelease=(resolve)=>{
	let _this=this;
	let url='http://www.hilyy.cn/index.php/tiku/Xiangmu/chengji';
	let params='crrage=1';
	 NetUtil.postForm(url,params,function(result){
		 _this.setState({
			dataSource:_this.state.dataSource.cloneWithRows(result),
		 });
		storage.save({
			key: 'lawlist',
			data: { 
				lawdata:result,
			},
				expires: null,
		});		 
	 });
	setTimeout(() => {
    resolve();
}, 3000);
}

  render() {
	 return (
<Image style={{width:'100%',height:'100%'}} source={require('../images/bj.png')}>
	<View style={styles.zuida}>
		<View style={styles.tou}>
			<TouchableOpacity activeOpacity={1} onPress={this.shouye}>
        		<Image style={{width:30,height:23,marginLeft:10,marginTop:12}} source={require('../images/fanhui.png')}/>
      		</TouchableOpacity>
			<Text style={styles.tousan}>考试成绩</Text>
		</View>
		<View style={styles.kuang}>
			<Text style={styles.zi}>考试类型</Text>			
			<Text style={styles.zi2}>试题满分</Text>
			<Text style={styles.zi2}>我的成绩</Text>
			<Text style={styles.zi2}>考试时间</Text>
		</View>
		<ScrollView>
			<ListView
					  onPullRelease={this.onPullRelease}
	                  dataSource={this.state.dataSource}
					  renderRow={(rowData)=>
				<View style={{flexDirection:'row',height:30}}>
			<Text style={styles.zi3}>{rowData.subname}</Text>
			<Text style={styles.zi4}>{rowData.zongfen}</Text>
			<Text style={styles.zi5}>{rowData.score}</Text>
			<Text style={styles.zi6}>{rowData.pubdate}</Text>
				</View>
				}/>
		</ScrollView>		
    </View>
</Image>
    );
  }
      renderFooter() {
      if(this.state.nomore) {
          return null;
      }
      return (
          <View style={{height: 100}}>
              <ActivityIndicator />
          </View>
      );
    }
}
const styles = StyleSheet.create({
	dayu:{
		marginTop:8,
		fontSize:20,
		marginLeft:275,
	},
	zuida:{
		width:'100%',
		height:711,	
	},
	tou: {
		height:50,
		width:'100%',
		backgroundColor:'#1dacfa',
		flexDirection:'row',  
	},
	zhong: {
		height:40,
		width:'100%',
		backgroundColor:'#fff',
		flexDirection:'row',  
		borderBottomWidth:1,
		borderColor:'#ccc',
	},
	xia: {
		height:50,
		width:'100%',
		marginTop:30,
		backgroundColor:'#fff',
		alignItems:'center',
		flexDirection:'row',  
		justifyContent:'center',
	},
	tousan: {
		marginTop:10,
		fontSize:18,
		color:'#fff',
		marginLeft:100,
	},
	zhonger:{
		marginTop:17,
		fontSize:15,
		color:'#000',
		marginLeft:10,
	},
	xiaer:{
		fontWeight:'500',
		fontSize:17,
		color:'#1dacfa',
		
	},
	kuang:{
		width:'100%',
		height:40,
		backgroundColor:'#fff',
		flexDirection:'row', 
	 	borderBottomWidth:1,
		borderColor:'#ccc',	 
	},
	zi:{
		marginTop:9,
		marginLeft:12,
		fontSize:15,
		color:'#000',
	},
	zi2:{
		marginTop:9,
		marginLeft:'7%',
		fontSize:15,
		color:'#000',
	},
	zi3:{
		marginTop:5,
		marginLeft:'5%',
		color:'#000',
		height:30,
		
	},	
	zi4:{
		marginTop:3,
		marginLeft:'14%',
		paddingLeft:8,
		color:'#000',
		height:30,
		width:'2%',
		
	},	
	zi5:{
		marginTop:3,
		marginLeft:'11%',
		paddingLeft:8,
		color:'#000',
		height:30,
		width:'3%',
		
	},	
	zi6:{
		marginTop:3,
		marginLeft:'8%',
		paddingLeft:10,
		color:'#000',
		height:30,
		width:'20%',
		
	},	
});


