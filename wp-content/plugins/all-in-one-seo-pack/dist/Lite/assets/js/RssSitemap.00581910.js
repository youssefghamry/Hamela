import{a as i}from"./vuex.esm.8fdeb4b6.js";import{C as o}from"./CommonSitemap.bfe9fab6.js";import{B as n}from"./Checkbox.60ba2f56.js";import{C as a}from"./Card.fbb39c92.js";import{C as r}from"./PostTypeOptions.3b4c42c4.js";import{C as p}from"./SettingsRow.edbb3005.js";import{S as l}from"./External.4c957e9a.js";import{n as m}from"./_plugin-vue2_normalizer.61652a7c.js";import"./Checkmark.f26f6201.js";import"./Tooltip.68a8a92b.js";import"./_commonjsHelpers.f84db168.js";import"./Caret.6d7f2e24.js";import"./index.b661d021.js";import"./client.e62d6c37.js";import"./translations.c394afe3.js";import"./default-i18n.3a91e0e5.js";import"./index.83e63cda.js";import"./isArrayLikeObject.cf278c5f.js";import"./helpers.de7566d0.js";import"./constants.59a77347.js";import"./portal-vue.esm.98f2e05b.js";import"./Slide.15a07930.js";import"./HighlightToggle.62b97732.js";import"./Radio.7965b35c.js";import"./Row.830f6397.js";const c={components:{BaseCheckbox:n,CoreCard:a,CorePostTypeOptions:r,CoreSettingsRow:p,SvgExternal:l},mixins:[o],data(){return{pagePostOptions:[],strings:{rss:this.$t.__("RSS Sitemap",this.$td),description:this.$t.__("This option will generate a separate RSS Sitemap which can be submitted to Google, Bing and any other search engines that support this type of sitemap. The RSS Sitemap contains an RSS feed of the latest updates to your site content. It is not a full sitemap of all your content.",this.$td),enableSitemap:this.$t.__("Enable Sitemap",this.$td),sitemapSettings:this.$t.__("Sitemap Settings",this.$td),enableSitemapIndexes:this.$t.__("Enable Sitemap Indexes",this.$td),sitemapIndexes:this.$t.__("Organize sitemap entries into distinct files in your sitemap. We recommend you enable this setting if your sitemap contains more than 1,000 URLs.",this.$td),linksPerSitemap:this.$t.__("Number of Posts",this.$td),noIndexDisplayed:this.$t.__("Noindexed content will not be displayed in your sitemap.",this.$td),doYou404:this.$t.__("Do you get a blank sitemap or 404 error?",this.$td),openSitemap:this.$t.__("Open RSS Sitemap",this.$td),maxLinks:this.$t.__("Allows you to specify the maximum number of posts for the RSS Sitemap. We recommend an amount of 50 posts.",this.$td),automaticallyPingSearchEngines:this.$t.__("Automatically Ping Search Engines",this.$td),postTypes:this.$t.__("Post Types",this.$td),taxonomies:this.$t.__("Taxonomies",this.$td),dateArchiveSitemap:this.$t.__("Date Archive Sitemap",this.$td),includeDateArchives:this.$t.__("Include Date Archives in your sitemap.",this.$td),authorSitemap:this.$t.__("Author Sitemap",this.$td),includeAuthorArchives:this.$t.__("Include Author Archives in your sitemap.",this.$td),includeAllPostTypes:this.$t.__("Include All Post Types",this.$td),selectPostTypes:this.$t.__("Select which Post Types appear in your sitemap.",this.$td),includeAllTaxonomies:this.$t.__("Include All Taxonomies",this.$td),selectTaxonomies:this.$t.__("Select which Taxonomies appear in your sitemap.",this.$td)}}},computed:{...i(["options"]),getExcludedPostTypes(){return["attachment"]}}};var u=function(){var t=this,s=t._self._c;return s("div",{staticClass:"aioseo-rss-sitemap"},[s("core-card",{attrs:{slug:"rssSitemap","header-text":t.strings.rss}},[s("div",{staticClass:"aioseo-settings-row aioseo-section-description"},[t._v(" "+t._s(t.strings.description)+" "),s("span",{domProps:{innerHTML:t._s(t.$links.getDocLink(t.$constants.GLOBAL_STRINGS.learnMore,"rssSitemaps",!0))}})]),s("core-settings-row",{attrs:{name:t.strings.enableSitemap},scopedSlots:t._u([{key:"content",fn:function(){return[s("base-toggle",{model:{value:t.options.sitemap.rss.enable,callback:function(e){t.$set(t.options.sitemap.rss,"enable",e)},expression:"options.sitemap.rss.enable"}})]},proxy:!0}])}),t.options.sitemap.rss.enable?s("core-settings-row",{attrs:{name:t.$constants.GLOBAL_STRINGS.preview},scopedSlots:t._u([{key:"content",fn:function(){return[s("div",{staticClass:"aioseo-sitemap-preview"},[s("base-button",{attrs:{size:"medium",type:"blue",tag:"a",href:t.$aioseo.urls.rssSitemapUrl,target:"_blank"}},[s("svg-external"),t._v(" "+t._s(t.strings.openSitemap)+" ")],1)],1),s("div",{staticClass:"aioseo-description"},[t._v(" "+t._s(t.strings.noIndexDisplayed)+" "),s("br"),t._v(" "+t._s(t.strings.doYou404)+" "),s("span",{domProps:{innerHTML:t._s(t.$links.getDocLink(t.$constants.GLOBAL_STRINGS.learnMore,"blankSitemap",!0))}})])]},proxy:!0}],null,!1,1349901811)}):t._e()],1),t.options.sitemap.rss.enable?s("core-card",{attrs:{slug:"rssSitemapSettings","header-text":t.strings.sitemapSettings}},[s("core-settings-row",{attrs:{name:t.strings.linksPerSitemap},scopedSlots:t._u([{key:"content",fn:function(){return[s("base-input",{staticClass:"aioseo-links-per-site",attrs:{type:"number",size:"medium",min:1,max:5e4},on:{keyup:t.validateLinksPerIndex},model:{value:t.options.sitemap.rss.linksPerIndex,callback:function(e){t.$set(t.options.sitemap.rss,"linksPerIndex",e)},expression:"options.sitemap.rss.linksPerIndex"}}),s("div",{staticClass:"aioseo-description"},[t._v(" "+t._s(t.strings.maxLinks)+" "),s("span",{domProps:{innerHTML:t._s(t.$links.getDocLink(t.$constants.GLOBAL_STRINGS.learnMore,"maxLinksRss",!0))}})])]},proxy:!0}],null,!1,266830765)}),s("core-settings-row",{attrs:{name:t.strings.postTypes},scopedSlots:t._u([{key:"content",fn:function(){return[s("base-checkbox",{attrs:{size:"medium"},model:{value:t.options.sitemap.rss.postTypes.all,callback:function(e){t.$set(t.options.sitemap.rss.postTypes,"all",e)},expression:"options.sitemap.rss.postTypes.all"}},[t._v(" "+t._s(t.strings.includeAllPostTypes)+" ")]),t.options.sitemap.rss.postTypes.all?t._e():s("core-post-type-options",{attrs:{options:t.options.sitemap.rss,type:"postTypes",excluded:t.getExcludedPostTypes}}),s("div",{staticClass:"aioseo-description"},[t._v(" "+t._s(t.strings.selectPostTypes)+" "),s("span",{domProps:{innerHTML:t._s(t.$links.getDocLink(t.$constants.GLOBAL_STRINGS.learnMore,"selectPostTypesRss",!0))}})])]},proxy:!0}],null,!1,1249404784)})],1):t._e()],1)},_=[],d=m(c,u,_,!1,null,null,null,null);const H=d.exports;export{H as default};