/**
 * Sample React Native App
 * https://github.com/facebook/react-native
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
import { Navigator } from 'react-native-deprecated-custom-components';
import cuoti from './cuoti';
import shouye from './shouye';
import NetUtil from './NetUtil';
import {PullList} from 'react-native-pull';	 //下拉刷新	
export default class cuotijilu extends Component {
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
	//alert(this.state.userid);
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
		let url="http://www.hilyy.cn/index.php/tiku/Xiangmu/cuotijilu";
		let params='crrage=1&userid='+this.state.userid;
		NetUtil.postForm(url,params,function(result){
			_this.setState({
				dataSource:_this.state.dataSource.cloneWithRows(result),
			});
		
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
cuoti=(nid)=>{
	const {navigator}=this.props;
		if(navigator){
			navigator.push({
				name:'cuoti',
				component:cuoti,
				params:{
					nid:nid,
				}
			})
		}
	}
  shouye=()=>{
   this.props.navigator.push({
     name:'shouye',
    component:shouye,
    params:{
		userid:this.state.userid,
	}
	});
  }
onPullRelease=(resolve)=>{
	let _this=this;
	let url='http://www.hilyy.cn/index.php/tiku/Xiangmu/cuotijilu';
	let params='crrage=1';
	 NetUtil.postForm(url,params,function(result){
		 _this.setState({
			dataSource:_this.state.dataSource.cloneWithRows(result),
		 });
		
	 });
	setTimeout(() => {
    resolve();
}, 3000);
}
  render() {
    return (
<Image style={{width:'100%',height:'100%'}} source={require('../images/bj.png')}>

    <View style={{height:'100%',}}>
      <View style={styles.head}>
        <TouchableOpacity activeOpacity={1} onPress={this.shouye}>
        	<Image style={{width:32,height:25,marginLeft:10,marginTop:10}} source={require('../images/fanhui.png')}/>
      	</TouchableOpacity>
        <Text style={styles.timu}>错题记录</Text>
      </View>
 
	  <ListView
				  onPullRelease={this.onPullRelease}
                  dataSource={this.state.dataSource}
				  renderRow={(rowData)=>
			<View style={styles.jilu}>
		<TouchableOpacity onPress={this.cuoti.bind(this,rowData.id)} activeOpacity={1} >
		<Text style={styles.zi}>
		{rowData.id}、
		{rowData.title}
		</Text>
		</TouchableOpacity>
			</View>
			}/>	 

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
 head:{
   backgroundColor:'#1dacfa',
   height:50,
   flexDirection:'row'
 },
 timu:{
	 marginTop:12,
	 fontSize:18,
	 marginLeft:'28%',
	 color:'#fff',
 },
zi:{
	fontSize:15,
	color:'#000',
	marginLeft:'2%'
},

jilu:{
	flexDirection:'row',
	height:57,
	width:'98%',
	borderWidth:1,
	borderColor:'#acaeaf',
	marginTop:'2%',
	marginLeft:'1%',
	backgroundColor:'#eef5ff',
	opacity:0.5,
}
});

